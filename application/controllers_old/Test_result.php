<?php

class Test_result extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Common_model');
    }

    public function test_result() {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $date = $this->input->post('date');
            $patient = explode("###", $this->input->post('patient_id'));
            $patient_id = $patient[0];
            $patient_name = $patient[1];
            $res_test_category = explode("###", $this->input->post('test_category'));
            $test_category = $res_test_category[1];
            $test_name = $res_test_category[0];
            $age = $this->input->post('age');
            $sex = $this->input->post('sex');
            $ref_by = $this->input->post('ref_by');
            $report_date = $this->input->post('report_date');

            $result = $this->Common_model->find_last_id('record_id', 'test_result');
            if (empty($result)) {
                $record_id = 1;
            } else {
                foreach ($result as $info) {
                    $record_id = $info->record_id;
                }
                $record_id += 1;
            }

            $insert_data = array(
                'record_id' => $record_id,
                'date' => $date,
                'patient_id' => $patient_id,
                'patient_name' => $patient_name,
                'doctor_name' => $ref_by,
                'age' => $age,
                'sex' => $sex,
                'test_category' => $test_category,
                'test_name' => $test_name,
                'report_date' => $report_date
            );
            $this->Common_model->insert_data('test_result', $insert_data);
            $test_inserted_id = $record_id;
            if ($test_category == "Haematology") {
                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'report_date' => $report_date,
                    'hemoglobin' => $this->input->post('Hemoglobin'),
                    'esr' => $this->input->post('ESR'),
                    'total_wbc' => $this->input->post('Total_WBC_Count'),
                    'neutrophils' => $this->input->post('Neutrophils'),
                    'lymphocytes' => $this->input->post('Lymphocytes'),
                    'monocytes' => $this->input->post('Monocytes'),
                    'eosinophils' => $this->input->post('Eosinophils'),
                    'basophils' => $this->input->post('Basophils'),
                    'others_cell' => $this->input->post('Others_Cell'),
                    'total_eosinophils' => $this->input->post('Total_Eosinophil'),
                    'platelet_count' => $this->input->post('Platelet_Count'),
                    'mpv' => $this->input->post('MPV'),
                    'pdw' => $this->input->post('PDW'),
                    'pct' => $this->input->post('PCT'),
                    'rbc_count' => $this->input->post('RBC_Count'),
                    'hct_pcv' => $this->input->post('HCT_PCV'),
                    'mcv' => $this->input->post('MCV'),
                    'mch' => $this->input->post('MCH'),
                    'mchc' => $this->input->post('MCHC'),
                    'rdw_cv' => $this->input->post('RDW_CV'),
                    'rdw_sd' => $this->input->post('RDW_SD'),
                    'p_lcr' => $this->input->post('P_LCR'),
                    'bt' => $this->input->post('bt'),
                    'ct' => $this->input->post('ct'),
                    'hb_cyan' => $this->input->post('hb_cyan'),
                    'pbf' => $this->input->post('pbf'),
                    'ct' => $this->input->post('ct'),
                    'note' => $this->input->post('note'),
                    'mp' => $this->input->post('mp'),
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_haematology', $insert_data);

                $this->zend->load('Zend/Barcode');
                $image_file = Zend_Barcode::draw('code128', 'image', array('text' => 'HAE' . sprintf('%d', $record_id)), array());
                imagejpeg($image_file, "./assets/img/barcode/HAE$record_id.jpg");

                redirect('/Test_result/show_report/' . $test_inserted_id, 'refresh');
            } elseif ($test_category == "Biochemistry") {
                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'report_date' => $report_date,
                    'bl_gl_fa' => $this->input->post('bl_gl_fa'),
                    'bl_gl_fa_sugar' => $this->input->post('bl_gl_fa_sugar'),
                    'bl_gl_2h' => $this->input->post('bl_gl_2h'),
                    'bl_gl_2h_sugar' => $this->input->post('bl_gl_2h_sugar'),
                    'bl_gl_1h_75' => $this->input->post('bl_gl_1h_75'),
                    'bl_gl_1h_75_sugar' => $this->input->post('bl_gl_1h_75_sugar'),
                    'bl_gl_2h_75' => $this->input->post('bl_gl_2h_75'),
                    'bl_gl_2h_75_sugar' => $this->input->post('bl_gl_2h_75_sugar'),
                    'se_cr' => $this->input->post('se_cr'),
                    'se_bi' => $this->input->post('se_bi'),
                    'se_bi_di' => $this->input->post('se_bi_di'),
                    'se_bi_in' => $this->input->post('se_bi_in'),
                    'se_ur_ac' => $this->input->post('se_ur_ac'),
                    'se_ca' => $this->input->post('se_ca'),
                    'se_am' => $this->input->post('se_am'),
                    'sgpt' => $this->input->post('sgpt'),
                    'sopt' => $this->input->post('sopt'),
                    'se_al_ph' => $this->input->post('se_al_ph'),
                    'se_ur' => $this->input->post('se_ur'),
                    'hba1c' => $this->input->post('hba1c'),
                    'se_ch' => $this->input->post('se_ch'),
                    'tri_gl' => $this->input->post('tri_gl'),
                    'hdl' => $this->input->post('hdl'),
                    'ldl' => $this->input->post('ldl'),
                    'sodium' => $this->input->post('sodium'),
                    'chloride' => $this->input->post('chloride'),
                    'potassium' => $this->input->post('potassium'),
                    'test_inserted_id' => $test_inserted_id,
                    'OGTT' => $this->input->post('OGTT'),
                    'lipid_profile' => $this->input->post('lipid_profile'),
                    'urea_nitrogen' => $this->input->post('urea_nitrogen'),
                    'se_albumin' => $this->input->post('se_albumin'),
                    'se_globulin' => $this->input->post('se_globulin'),
                    'se_protein' => $this->input->post('se_protein'),
                    'se_lipase' => $this->input->post('se_lipase'),
                    'RBS' => $this->input->post('RBS')
                );
                $this->Common_model->insert_data('report_biochemistry', $insert_data);

                $this->zend->load('Zend/Barcode');
                $image_file = Zend_Barcode::draw('code128', 'image', array('text' => 'BIO' . sprintf('%d', $record_id)), array());
                imagejpeg($image_file, "./assets/img/barcode/BIO$record_id.jpg");

                redirect('/Test_result/show_report/' . $test_inserted_id, 'refresh');
            } elseif ($test_category == "Immunology") {
                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'report_date' => $report_date,
                    'HbA1c' => $this->input->post('HbA1c'),
                    'TSH' => $this->input->post('TSH'),
                    'T4' => $this->input->post('T4'),
                    'T3' => $this->input->post('T3'),
                    'Troponin_I' => $this->input->post('Troponin_I'),
                    'CRP' => $this->input->post('CRP'),
                    'test_inserted_id' => $test_inserted_id,
                    'FT3' => $this->input->post('FT3'),
                    'FT4' => $this->input->post('FT4'),
                    'se_ige' => $this->input->post('se_ige'),
                    'se_igg' => $this->input->post('se_igg'),
                    'se_prolectin' => $this->input->post('se_prolectin'),
                    'psa' => $this->input->post('psa'),
                    'testosterone' => $this->input->post('testosterone'),
                    'hcg' => $this->input->post('hcg')
                );
                $this->Common_model->insert_data('report_immunology', $insert_data);

                $this->zend->load('Zend/Barcode');
                $image_file = Zend_Barcode::draw('code128', 'image', array('text' => 'IMM' . sprintf('%d', $record_id)), array());
                imagejpeg($image_file, "./assets/img/barcode/IMM$record_id.jpg");

                redirect('/Test_result/show_report/' . $test_inserted_id, 'refresh');
            } elseif ($test_category == "MT") {
                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'report_date' => $report_date,
                    'MT' => $this->input->post('MT'),
                    'comment' => $this->input->post('comment'),
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_mt', $insert_data);

                $this->zend->load('Zend/Barcode');
                $image_file = Zend_Barcode::draw('code128', 'image', array('text' => 'MT' . sprintf('%d', $record_id)), array());
                imagejpeg($image_file, "./assets/img/barcode/MT$record_id.jpg");

                redirect('/Test_result/show_report/' . $test_inserted_id, 'refresh');
            } elseif ($test_category == "Urine Examination") {
                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'report_date' => $report_date,
                    'Colour' => $this->input->post('Colour'),
                    'Appearance' => $this->input->post('Appearance'),
                    'Sediment' => $this->input->post('Sediment'),
                    'Specific_gravity' => $this->input->post('Specific_gravity'),
                    'PH' => $this->input->post('PH'),
                    'Protein' => $this->input->post('Protein'),
                    'Reducing_Substance' => $this->input->post('Reducing_Substance'),
                    'Ex_Phosphate' => $this->input->post('Ex_Phosphate'),
                    'Ketones' => $this->input->post('Ketones'),
                    'Bilirubin' => $this->input->post('Bilirubin'),
                    'Urobilinogen' => $this->input->post('Urobilinogen'),
                    'Nitrate' => $this->input->post('Nitrate'),
                    'Blood' => $this->input->post('Blood'),
                    'Leukocyte' => $this->input->post('Leukocyte'),
                    'Epithelial_Cell' => $this->input->post('Epithelial_Cell'),
                    'Pus_Cell' => $this->input->post('Pus_Cell'),
                    'RBC' => $this->input->post('RBC'),
                    'Hyaline' => $this->input->post('Hyaline'),
                    'Granular' => $this->input->post('Granular'),
                    'WBC' => $this->input->post('WBC'),
                    'RBC_cast' => $this->input->post('RBC_cast'),
                    'Calcium_Oxalate' => $this->input->post('Calcium_Oxalate'),
                    'Amor_Phosphate' => $this->input->post('Amor_Phosphate'),
                    'Triple_Phosphate' => $this->input->post('Triple_Phosphate'),
                    'Uric_Acid' => $this->input->post('Uric_Acid'),
                    'pregnancy' => $this->input->post('pregnancy'),
                    'Photocoagulation' => $this->input->post('Photocoagulation'),
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_urinerme', $insert_data);

                $this->zend->load('Zend/Barcode');
                $image_file = Zend_Barcode::draw('code128', 'image', array('text' => 'URI' . sprintf('%d', $record_id)), array());
                imagejpeg($image_file, "./assets/img/barcode/URI$record_id.jpg");

                redirect('/Test_result/show_report/' . $test_inserted_id, 'refresh');
            } elseif ($test_category == "Stool Examination") {

                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'report_date' => $report_date,
                    'consistency' => $this->input->post('consistency'),
                    'color' => $this->input->post('color'),
                    'mucus' => $this->input->post('mucus'),
                    'blood' => $this->input->post('blood'),
                    'reaction' => $this->input->post('reaction'),
                    'occult_blood' => $this->input->post('occult_blood'),
                    'reducing_substance' => $this->input->post('reducing_substance'),
                    'ascaris' => $this->input->post('ascaris'),
                    'ankylostoma' => $this->input->post('ankylostoma'),
                    'trichuris' => $this->input->post('trichuris'),
                    'giardia' => $this->input->post('giardia'),
                    'e_histolytica' => $this->input->post('e_histolytica'),
                    'e_coli' => $this->input->post('e_coli'),
                    'vegetable_cells' => $this->input->post('vegetable_cells'),
                    'muscle_cells' => $this->input->post('muscle_cells'),
                    'fat_globules' => $this->input->post('fat_globules'),
                    'starch_granules' => $this->input->post('starch_granules'),
                    'RBC' => $this->input->post('RBC'),
                    'pus_cells' => $this->input->post('pus_cells'),
                    'epithelial_cells' => $this->input->post('epithelial_cells'),
                    'worm' => $this->input->post('worm'),
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_stool_rme', $insert_data);

                $this->zend->load('Zend/Barcode');
                $image_file = Zend_Barcode::draw('code128', 'image', array('text' => 'STO' . sprintf('%d', $record_id)), array());
                imagejpeg($image_file, "./assets/img/barcode/STO$record_id.jpg");

                redirect('/Test_result/show_report/' . $test_inserted_id, 'refresh');
            } elseif ($test_category == "Cross Matching") {
                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'report_date' => $report_date,
                    'ABO_group' => $this->input->post('ABO_group'),
                    'Rh_type' => $this->input->post('Rh_type'),
                    'doner_name' => $this->input->post('doner_name'),
                    'doner_abo' => $this->input->post('doner_abo'),
                    'rh_types' => $this->input->post('rh_types'),
                    'cross_matching' => $this->input->post('cross_matching'),
                    'age_d' => $this->input->post('age_d'),
                    'sex_d' => $this->input->post('sex_d'),
                    'scr_test' => $this->input->post('scr_test'),
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_cross_matching', $insert_data);

                $this->zend->load('Zend/Barcode');
                $image_file = Zend_Barcode::draw('code128', 'image', array('text' => 'CRO' . sprintf('%d', $record_id)), array());
                imagejpeg($image_file, "./assets/img/barcode/CRO$record_id.jpg");

                redirect('/Test_result/show_report/' . $test_inserted_id, 'refresh');
            } elseif ($test_category == "Semen Analysis") {
                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'report_date' => $report_date,
                    'Amount' => $this->input->post('Amount'),
                    'Colour' => $this->input->post('Colour'),
                    'Viscosity' => $this->input->post('Viscosity'),
                    'TC_of_Sperm' => $this->input->post('TC_of_Sperm'),
                    'Active_Motile' => $this->input->post('Active_Motile'),
                    'Weakly_Motile' => $this->input->post('Weakly_Motile'),
                    'Non_Motile' => $this->input->post('Non_Motile'),
                    'Morphologically_Normal' => $this->input->post('Morphologically_Normal'),
                    'Morphologically_Abnormal' => $this->input->post('Morphologically_Abnormal'),
                    'Pus_Cell' => $this->input->post('Pus_Cell'),
                    'Epithelial_Cell' => $this->input->post('Epithelial_Cell'),
                    'RBC' => $this->input->post('RBC'),
                    'Fructose' => $this->input->post('Fructose'),
                    'collection_place' => $this->input->post('collection_place'),
                    'ejaculation_time' => $this->input->post('ejaculation_time'),
                    'examination_time' => $this->input->post('examination_time'),
                    'abstinence_period' => $this->input->post('abstinence_period'),
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_semen_analysis_report', $insert_data);

                $this->zend->load('Zend/Barcode');
                $image_file = Zend_Barcode::draw('code128', 'image', array('text' => 'SEM' . sprintf('%d', $record_id)), array());
                imagejpeg($image_file, "./assets/img/barcode/SEM$record_id.jpg");

                redirect('/Test_result/show_report/' . $test_inserted_id, 'refresh');
            } elseif ($test_category == "Skin Scraping Test") {
                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'report_date' => $report_date,
                    'SKIN' => $this->input->post('SKIN'),
                    'THROAT' => $this->input->post('THROAT'),
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_skin_scraping', $insert_data);

                $this->zend->load('Zend/Barcode');
                $image_file = Zend_Barcode::draw('code128', 'image', array('text' => 'SKI' . sprintf('%d', $record_id)), array());
                imagejpeg($image_file, "./assets/img/barcode/SKI$record_id.jpg");

                redirect('/Test_result/show_report/' . $test_inserted_id, 'refresh');
            } elseif ($test_category == "Serological Test") {
                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'report_date' => $report_date,
                    'RA_Test' => $this->input->post('RA_Test'),
                    'CRP' => $this->input->post('CRP'),
                    'HBsAg' => $this->input->post('HBsAg'),
                    'VDRL' => $this->input->post('VDRL'),
                    'Blood_group' => $this->input->post('Blood_group'),
                    'Widal_Test' => $this->input->post('Widal_Test'),
                    'ASO_Titre' => $this->input->post('ASO_Titre'),
                    'Typhoid_Paratyphoid' => $this->input->post('Typhoid_Paratyphoid'),
                    'Brucellosis' => $this->input->post('Brucellosis'),
                    'Typhus_Fever' => $this->input->post('Typhus_Fever'),
                    'test_inserted_id' => $test_inserted_id,
                    'HBsAg_con' => $this->input->post('HBsAg_con'),
                    'TPHA' => $this->input->post('TPHA'),
                    'Aldehyde' => $this->input->post('Aldehyde'),
                    'Typhoid' => $this->input->post('Typhoid'),
                    'TB' => $this->input->post('TB'),
                    'Failaria' => $this->input->post('Failaria'),
                    'Kala_Azar' => $this->input->post('Kala_Azar'),
                    'Malaria' => $this->input->post('Malaria'),
                    'HIV' => $this->input->post('HIV'),
                    'HCV' => $this->input->post('HCV'),
                    'Dengu_ns1' => $this->input->post('Dengu_ns1'),
                    'Dengu_igg_igm' => $this->input->post('Dengu_igg_igm')
                );
                $this->Common_model->insert_data('report_serological', $insert_data);

                $this->zend->load('Zend/Barcode');
                $image_file = Zend_Barcode::draw('code128', 'image', array('text' => 'SER' . sprintf('%d', $record_id)), array());
                imagejpeg($image_file, "./assets/img/barcode/SER$record_id.jpg");

                redirect('/Test_result/show_report/' . $test_inserted_id, 'refresh');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

    public function show_report($test_id) {
        $user_type = $this->session->ses_user_type;
        if ($user_type == "admin") {
            $result = $this->Common_model->get_allinfo_byid('test_result', 'record_id', $test_id);
            foreach ($result as $info) {
                $test_category = $info->test_category;
                $test_name = $info->test_name;
            }
            $data['test_id'] = $test_id;
            $data['test_name'] = $test_name;
            if ($test_category == "Haematology") {
                $data["test_res"] = $this->Common_model->get_allinfo_byid('report_haematology', 'test_inserted_id', $test_id);

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_haematology_print', $data);
                $this->load->view('admin/footer');
            } elseif ($test_category == "Biochemistry") {
                $data["test_res"] = $this->Common_model->get_allinfo_byid('report_biochemistry', 'test_inserted_id', $test_id);

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_biochemistry_print', $data);
                $this->load->view('admin/footer');
            } elseif ($test_category == "Immunology") {
                $data["test_res"] = $this->Common_model->get_allinfo_byid('report_immunology', 'test_inserted_id', $test_id);

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_IMMUNOLOGY_print', $data);
                $this->load->view('admin/footer');
            } elseif ($test_category == "MT") {
                $data["test_res"] = $this->Common_model->get_allinfo_byid('report_mt', 'test_inserted_id', $test_id);

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_MT_print', $data);
                $this->load->view('admin/footer');
            } elseif ($test_category == "Urine Examination") {
                $data["test_res"] = $this->Common_model->get_allinfo_byid('report_urinerme', 'test_inserted_id', $test_id);

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_UrineRME_print', $data);
                $this->load->view('admin/footer');
            } elseif ($test_category == "Stool Examination") {
                $data["test_res"] = $this->Common_model->get_allinfo_byid('report_stool_rme', 'test_inserted_id', $test_id);

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_stool_rme_print', $data);
                $this->load->view('admin/footer');
            } elseif ($test_category == "Cross Matching") {
                $data["test_res"] = $this->Common_model->get_allinfo_byid('report_cross_matching', 'test_inserted_id', $test_id);

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_cross_matching_print', $data);
                $this->load->view('admin/footer');
            } elseif ($test_category == "Semen Analysis") {
                $data["test_res"] = $this->Common_model->get_allinfo_byid('report_semen_analysis_report', 'test_inserted_id', $test_id);

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_semen_analysis_report_print', $data);
                $this->load->view('admin/footer');
            } elseif ($test_category == "Skin Scraping Test") {
                $data["test_res"] = $this->Common_model->get_allinfo_byid('report_skin_scraping', 'test_inserted_id', $test_id);

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_Skin_Scraping_Report_print', $data);
                $this->load->view('admin/footer');
            } elseif ($test_category == "Serological Test") {
                $data["test_res"] = $this->Common_model->get_allinfo_byid('report_serological', 'test_inserted_id', $test_id);

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_Serological_Test_Report_print', $data);
                $this->load->view('admin/footer');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

}
