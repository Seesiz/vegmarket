<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Stock extends CI_Controller
	{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Stock_model');
        }

        public function historique($mv = "sortie")
        {
            if($mv == "sortie"){
                $data['title'] = "Historique de sortie.";
                $data['content'] = "stock/historique_sortie";
            }else{
                $data['title'] = "Historique d'entrée.";
                $data['content'] = "stock/historique_entree";
            }   
            $this->load->view('components/body',$data);
        }

        public function mouvement($mvt = "sortie")
        {
            $data['title'] = "Mouvement de stock."; 
            if($mvt == "sortie"){
                $data['content'] = "stock/mouvement_sortie";
            }else{
                $data['content'] = "stock/mouvement_entree";
            }
            $this->load->view('components/body',$data);
        }

        public function etat()
        {

        }

        public function entrepot()
        {
            $data['title'] = "Entrepôt.";
            $data['content'] = "stock/entrepot";
            $data['produits'] = $this->Stock_model->getProduit();
            $data['entrepots'] = $this->Stock_model->getEntrepot();
            $this->load->view('components/body',$data);
        }

        public function produit()
        {
            $data['title'] = "Produit.";
            $data['content'] = "stock/produit";
            $data['produits'] = $this->Stock_model->getProduit();
            $this->load->view('components/body',$data);
        }

        public function insertionProduit()
        {
            $this->Stock_model->insertProduit($_POST['produit']);
            redirect(site_url('stock/produit'));
        }

        public function insertionEntrepot()
        {
            $this->Stock_model->insertEntrepot($_POST);
        }

        public function deleteProduit($id)
        {
            $this->Stock_model->deleteProd($id); 
            redirect(site_url('stock/produit'));
        }
    }