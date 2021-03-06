<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Paiement extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Paiement_model');
    } 

    /*
     * Listing of paiements
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('paiement/index?');
        $config['total_rows'] = $this->Paiement_model->get_all_paiements_count();
        $this->pagination->initialize($config);

        $data['paiements'] = $this->Paiement_model->get_all_paiements($params);
        
        $data['_view'] = 'paiement/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new paiement
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'statut_paiement' => $this->input->post('statut_paiement'),
				'numero_note_sid' => $this->input->post('numero_note_sid'),
				'client_sid' => $this->input->post('client_sid'),
				'date_paiement' => $this->input->post('date_paiement'),
				'date_validation' => date('Y-m-d H:i:s'),
				'montant_verser' => $this->input->post('montant_verser'),
				'observation' => $this->input->post('observation'),
            );
            
            $paiement_id = $this->Paiement_model->add_paiement($params);
            redirect('paiement/index');
        }
        else
        {
			$this->load->model('Note_model');
			$data['all_notes'] = $this->Note_model->get_all_notes();

			$this->load->model('Client_model');
			$data['all_clients'] = $this->Client_model->get_all_clients();
            
            $data['_view'] = 'paiement/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a paiement
     */
    function edit($paiement_id)
    {   
        // check if the paiement exists before trying to edit it
        $data['paiement'] = $this->Paiement_model->get_paiement($paiement_id);
        
        if(isset($data['paiement']['paiement_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'statut_paiement' => $this->input->post('statut_paiement'),
					'numero_note_sid' => $this->input->post('numero_note_sid'),
					'client_sid' => $this->input->post('client_sid'),
					'date_paiement' => $this->input->post('date_paiement'),
					'date_validation' => date('Y-m-d H:i:s'),
					'montant_verser' => $this->input->post('montant_verser'),
					'observation' => $this->input->post('observation'),
                );

                $this->Paiement_model->update_paiement($paiement_id,$params);            
                redirect('paiement/index');
            }
            else
            {
				$this->load->model('Note_model');
				$data['all_notes'] = $this->Note_model->get_all_notes();

				$this->load->model('Client_model');
				$data['all_clients'] = $this->Client_model->get_all_clients();

                $data['_view'] = 'paiement/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The paiement you are trying to edit does not exist.');
    } 

    /*
     * Deleting paiement
     */
    function remove($paiement_id)
    {
        $paiement = $this->Paiement_model->get_paiement($paiement_id);

        // check if the paiement exists before trying to delete it
        if(isset($paiement['paiement_id']))
        {
            $this->Paiement_model->delete_paiement($paiement_id);
            redirect('paiement/index');
        }
        else
            show_error('The paiement you are trying to delete does not exist.');
    }
    
}
