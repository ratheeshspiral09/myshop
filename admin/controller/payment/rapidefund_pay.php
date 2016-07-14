<?php 
class ControllerPaymentrapidefundpay extends Controller {
	private $error = array(); 

	public function index() {
		$this->language->load('payment/rapidefund_pay');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('rapidefund_pay', $this->request->post);				

			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_all_zones'] = $this->language->get('text_all_zones');
		$this->data['text_test'] = $this->language->get('text_test');
		$this->data['text_live'] = $this->language->get('text_live');
		$this->data['text_authorization'] = $this->language->get('text_authorization');
		$this->data['text_capture'] = $this->language->get('text_capture');		

		$this->data['entry_username'] = $this->language->get('entry_username');
		$this->data['entry_password'] = $this->language->get('entry_password');
		$this->data['entry_merchant_id'] = $this->language->get('entry_merchant_id');
		$this->data['entry_merchant_name'] = $this->language->get('entry_merchant_name');
		$this->data['entry_terminal_id'] = $this->language->get('entry_terminal_id');

		$this->data['entry_server'] = $this->language->get('entry_server');
		$this->data['entry_mode'] = $this->language->get('entry_mode');
		$this->data['entry_method'] = $this->language->get('entry_method');
		$this->data['entry_total'] = $this->language->get('entry_total');	
		$this->data['entry_order_status'] = $this->language->get('entry_order_status');		
		$this->data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->error['username'])) {
			$this->data['error_username'] = $this->error['username'];
		} else {
			$this->data['error_username'] = '';
		}

		if (isset($this->error['merchant_id'])) {
			$this->data['error_merchant_id'] = $this->error['merchant_id'];
		} else {
			$this->data['error_merchant_id'] = '';
		}

		if (isset($this->error['merchant_name'])) {
			$this->data['error_merchant_name'] = $this->error['merchant_name'];
		} else {
			$this->data['error_merchant_name'] = '';
		}

		if (isset($this->error['password'])) {
			$this->data['error_password'] = $this->error['password'];
		} else {
			$this->data['error_password'] = '';
		}

		if (isset($this->error['terminal_id'])) {
			$this->data['error_terminal_id'] = $this->error['terminal_id'];
		} else {
			$this->data['error_terminal_id'] = '';
		}


		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_payment'),
			'href'      => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('payment/rapidefund_pay', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);

		$this->data['action'] = $this->url->link('payment/rapidefund_pay', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->post['rapidefund_pay_username'])) {
			$this->data['rapidefund_pay_username'] = $this->request->post['rapidefund_pay_username'];
		} else {
			$this->data['rapidefund_pay_username'] = $this->config->get('rapidefund_pay_username');
		}


		if (isset($this->request->post['rapidefund_pay_password'])) {
			$this->data['rapidefund_pay_password'] = $this->request->post['rapidefund_pay_password'];
		} else {
			$this->data['rapidefund_pay_password'] = $this->config->get('rapidefund_pay_password');
		}

		if (isset($this->request->post['rapidefund_merchant_id'])) {
			$this->data['rapidefund_merchant_id'] = $this->request->post['rapidefund_merchant_id'];
		} else {
			$this->data['rapidefund_merchant_id'] = $this->config->get('rapidefund_merchant_id');
		}

		if (isset($this->request->post['rapidefund_merchant_name'])) {
			$this->data['rapidefund_merchant_name'] = $this->request->post['rapidefund_merchant_name'];
		} else {
			$this->data['rapidefund_merchant_name'] = $this->config->get('rapidefund_merchant_name');
		}

		if (isset($this->request->post['rapidefund_terminal_id'])) {
			$this->data['rapidefund_terminal_id'] = $this->request->post['rapidefund_terminal_id'];
		} else {
			$this->data['rapidefund_terminal_id'] = $this->config->get('rapidefund_terminal_id');
		}


		if (isset($this->request->post['rapidefund_pay_server'])) {
			$this->data['rapidefund_pay_server'] = $this->request->post['rapidefund_pay_server'];
		} else {
			$this->data['rapidefund_pay_server'] = $this->config->get('rapidefund_pay_server');
		}

		if (isset($this->request->post['rapidefund_pay_mode'])) {
			$this->data['rapidefund_pay_mode'] = $this->request->post['rapidefund_pay_mode'];
		} else {
			$this->data['rapidefund_pay_mode'] = $this->config->get('rapidefund_pay_mode');
		}

		if (isset($this->request->post['rapidefund_pay_method'])) {
			$this->data['rapidefund_pay_method'] = $this->request->post['rapidefund_pay_method'];
		} else {
			$this->data['rapidefund_pay_method'] = $this->config->get('rapidefund_pay_method');
		}

		if (isset($this->request->post['rapidefund_pay_total'])) {
			$this->data['rapidefund_pay_total'] = $this->request->post['rapidefund_pay_total'];
		} else {
			$this->data['rapidefund_pay_total'] = $this->config->get('rapidefund_pay_total'); 
		} 

		if (isset($this->request->post['rapidefund_pay_order_status_id'])) {
			$this->data['rapidefund_pay_order_status_id'] = $this->request->post['rapidefund_pay_order_status_id'];
		} else {
			$this->data['rapidefund_pay_order_status_id'] = $this->config->get('rapidefund_pay_order_status_id'); 
		} 

		$this->load->model('localisation/order_status');

		$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		if (isset($this->request->post['rapidefund_pay_geo_zone_id'])) {
			$this->data['rapidefund_pay_geo_zone_id'] = $this->request->post['rapidefund_pay_geo_zone_id'];
		} else {
			$this->data['rapidefund_pay_geo_zone_id'] = $this->config->get('rapidefund_pay_geo_zone_id'); 
		} 

		$this->load->model('localisation/geo_zone');

		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		if (isset($this->request->post['rapidefund_pay_status'])) {
			$this->data['rapidefund_pay_status'] = $this->request->post['rapidefund_pay_status'];
		} else {
			$this->data['rapidefund_pay_status'] = $this->config->get('rapidefund_pay_status');
		}

		if (isset($this->request->post['rapidefund_pay_sort_order'])) {
			$this->data['rapidefund_pay_sort_order'] = $this->request->post['rapidefund_pay_sort_order'];
		} else {
			$this->data['rapidefund_pay_sort_order'] = $this->config->get('rapidefund_pay_sort_order');
		}

		$this->template = 'payment/rapidefund_pay.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'payment/rapidefund_pay')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['rapidefund_merchant_id']) {
			$this->error['merchant_id'] = $this->language->get('error_merchant_id');
		}

		if (!$this->request->post['rapidefund_merchant_name']) {
			$this->error['merchant_name'] = $this->language->get('error_merchant_name');
		}

		if (!$this->request->post['rapidefund_terminal_id']) {
			$this->error['terminal_id'] = $this->language->get('error_terminal_id');
		}


		if (!$this->request->post['rapidefund_pay_username']) {
			$this->error['username'] = $this->language->get('error_username');
		}

		if (!$this->request->post['rapidefund_pay_password']) {
			$this->error['password'] = $this->language->get('error_password');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
}
?>