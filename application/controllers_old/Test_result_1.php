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
                'age' => $age,
                'sex' => $sex,
                'test_category' => $test_category,
                'test_name' => $test_name
            );
            $this->Common_model->insert_data('test_result', $insert_data);
            $test_inserted_id = $record_id;

            $data['test_id'] = $test_inserted_id;
            if ($test_category == "Haematology") {
                $Hemoglobin = $this->input->post('Hemoglobin');
                $ESR = $this->input->post('ESR');
                $Total_WBC_Count = $this->input->post('Total_WBC_Count');
                $Neutrophils = $this->input->post('Neutrophils');
                $Lymphocytes = $this->input->post('Lymphocytes');
                $Monocytes = $this->input->post('Monocytes');
                $Eosinophils = $this->input->post('Eosinophils');
                $Basophils = $this->input->post('Basophils');
                $Others_Cell = $this->input->post('Others_Cell');
                $Total_Eosinophil = $this->input->post('Total_Eosinophil');
                $Platelet_Count = $this->input->post('Platelet_Count');
                $MPV = $this->input->post('MPV');
                $PDW = $this->input->post('PDW');
                $PCT = $this->input->post('PCT');
                $RBC_Count = $this->input->post('RBC_Count');
                $HCT_PCV = $this->input->post('HCT_PCV');
                $MCV = $this->input->post('MCV');
                $MCH = $this->input->post('MCH');
                $MCHC = $this->input->post('MCHC');
                $RDW_CV = $this->input->post('RDW_CV');
                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'hemoglobin' => $Hemoglobin,
                    'esr' => $ESR,
                    'total_wbc' => $Total_WBC_Count,
                    'neutrophils' => $Neutrophils,
                    'lymphocytes' => $Lymphocytes,
                    'monocytes' => $Monocytes,
                    'eosinophils' => $Eosinophils,
                    'basophils' => $Basophils,
                    'others_cell' => $Others_Cell,
                    'total_eosinophils' => $Total_Eosinophil,
                    'platelet_count' => $Platelet_Count,
                    'mpv' => $MPV,
                    'pdw' => $PDW,
                    'pct' => $PCT,
                    'rbc_count' => $RBC_Count,
                    'hct_pcv' => $HCT_PCV,
                    'mcv' => $MCV,
                    'mch' => $MCH,
                    'mchc' => $MCHC,
                    'rdw_cv' => $RDW_CV,
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_haematology', $insert_data);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['hemoglobin'] = $Hemoglobin;
                $data['esr'] = $ESR;
                $data['total_wbc'] = $Total_WBC_Count;
                $data['neutrophils'] = $Neutrophils;
                $data['lymphocytes'] = $Lymphocytes;
                $data['monocytes'] = $Monocytes;
                $data['eosinophils'] = $Eosinophils;
                $data['basophils'] = $Basophils;
                $data['others_cell'] = $Others_Cell;
                $data['total_eosinophils'] = $Total_Eosinophil;
                $data['platelet_count'] = $Platelet_Count;
                $data['mpv'] = $MPV;
                $data['pdw'] = $PDW;
                $data['pct'] = $PCT;
                $data['rbc_count'] = $RBC_Count;
                $data['hct_pcv'] = $HCT_PCV;
                $data['mcv'] = $MCV;
                $data['mch'] = $MCH;
                $data['mchc'] = $MCHC;
                $data['rdw_cv'] = $RDW_CV;

                $this->load->view('admin/header');
                $this->load->view('admin/report_haematology_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "IMMUNOLOGY") {
                $MP = $this->input->post('MP');
                $Method = $this->input->post('Method');
                $HbsAg = $this->input->post('HbsAg');
                $Method2 = $this->input->post('Method2');
                $VDRL = $this->input->post('VDRL');
                $Method3 = $this->input->post('Method3');
                $RA = $this->input->post('RA');

                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'MP' => $MP,
                    'Method' => $Method,
                    'HbsAg' => $HbsAg,
                    'Method2' => $Method2,
                    'VDRL' => $VDRL,
                    'Method3' => $Method3,
                    'RA' => $RA,
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_immunology', $insert_data);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['MP'] = $MP;
                $data['Method'] = $Method;
                $data['HbsAg'] = $HbsAg;
                $data['Method2'] = $Method2;
                $data['VDRL'] = $VDRL;
                $data['Method3'] = $Method3;
                $data['RA'] = $RA;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_IMMUNOLOGY_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "MT") {
                $MT = $this->input->post('MT');
                $comment = $this->input->post('comment');
                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'MT' => $MT,
                    'comment' => $comment,
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_mt', $insert_data);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['MT'] = $MT;
                $data['comment'] = $comment;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_MT_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "UrineRME") {
                $quantity_px = $this->input->post('quantity_px');
                $color_px = $this->input->post('color_px');
                $appearance_px = $this->input->post('appearance_px');
                $sediment_px = $this->input->post('sediment_px');
                $specificgravity_px = $this->input->post('specificgravity_px');
                $reaction_cx = $this->input->post('reaction_cx');
                $excessphosphate_cx = $this->input->post('excessphosphate_cx');
                $albumin_cx = $this->input->post('albumin_cx');
                $sugar_cx = $this->input->post('sugar_cx');
                $crystals_mx = $this->input->post('crystals_mx');
                $calciumoxalate_mx = $this->input->post('calciumoxalate_mx');
                $uricacid_mx = $this->input->post('uricacid_mx');
                $triplephosphate_mx = $this->input->post('triplephosphate_mx');
                $sulphonamide_mx = $this->input->post('sulphonamide_mx');
                $cysteine_mx = $this->input->post('cysteine_mx');
                $cholesterol_mx = $this->input->post('cholesterol_mx');
                $puscell_mx = $this->input->post('puscell_mx');
                $epithelialcell_mx = $this->input->post('epithelialcell_mx');
                $RBC_mx = $this->input->post('RBC_mx');
                $casts_mx = $this->input->post('casts_mx');
                $amorphousphosphate_mx = $this->input->post('amorphousphosphate_mx');
                $others = $this->input->post('others');

                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'quantity_px' => $quantity_px,
                    'color_px' => $color_px,
                    'appearance_px' => $appearance_px,
                    'sediment_px' => $sediment_px,
                    'specificgravity_px' => $specificgravity_px,
                    'reaction_cx' => $reaction_cx,
                    'excessphosphate_cx' => $excessphosphate_cx,
                    'albumin_cx' => $albumin_cx,
                    'sugar_cx' => $sugar_cx,
                    'crystals_mx' => $crystals_mx,
                    'calciumoxalate_mx' => $calciumoxalate_mx,
                    'uricacid_mx' => $uricacid_mx,
                    'triplephosphate_mx' => $triplephosphate_mx,
                    'sulphonamide_mx' => $sulphonamide_mx,
                    'cysteine_mx' => $cysteine_mx,
                    'cholesterol_mx' => $cholesterol_mx,
                    'puscell_mx' => $puscell_mx,
                    'epithelialcell_mx' => $epithelialcell_mx,
                    'RBC_mx' => $RBC_mx,
                    'casts_mx' => $casts_mx,
                    'amorphousphosphate_mx' => $amorphousphosphate_mx,
                    'others' => $others,
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_urinerme', $insert_data);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['quantity_px'] = $quantity_px;
                $data['color_px'] = $color_px;
                $data['appearance_px'] = $appearance_px;
                $data['sediment_px'] = $sediment_px;
                $data['specificgravity_px'] = $specificgravity_px;
                $data['reaction_cx'] = $reaction_cx;
                $data['excessphosphate_cx'] = $excessphosphate_cx;
                $data['albumin_cx'] = $albumin_cx;
                $data['sugar_cx'] = $sugar_cx;
                $data['crystals_mx'] = $crystals_mx;
                $data['calciumoxalate_mx'] = $calciumoxalate_mx;
                $data['uricacid_mx'] = $uricacid_mx;
                $data['triplephosphate_mx'] = $triplephosphate_mx;
                $data['sulphonamide_mx'] = $sulphonamide_mx;
                $data['cysteine_mx'] = $cysteine_mx;
                $data['cholesterol_mx'] = $cholesterol_mx;
                $data['puscell_mx'] = $puscell_mx;
                $data['epithelialcell_mx'] = $epithelialcell_mx;
                $data['RBC_mx'] = $RBC_mx;
                $data['casts_mx'] = $casts_mx;
                $data['amorphousphosphate_mx'] = $amorphousphosphate_mx;
                $data['others'] = $others;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_UrineRME_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Liverfunction-Biochemistry") {
                $serum_bilirubin_total = $this->input->post('serum_bilirubin_total');
                $SGPT = $this->input->post('SGPT');
                $AST = $this->input->post('AST');
                $alkaline_phos = $this->input->post('alkaline_phos');
                $control = $this->input->post('control');
                $patient = $this->input->post('patient');
                $INR = $this->input->post('INR');
                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'serum_bilirubin_total' => $serum_bilirubin_total,
                    'SGPT' => $SGPT,
                    'AST' => $AST,
                    'alkaline_phos' => $alkaline_phos,
                    'control' => $control,
                    'patient' => $patient,
                    'INR' => $INR,
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_liver_function', $insert_data);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['serum_bilirubin_total'] = $serum_bilirubin_total;
                $data['SGPT'] = $SGPT;
                $data['AST'] = $AST;
                $data['alkaline_phos'] = $alkaline_phos;
                $data['control'] = $control;
                $data['patient'] = $patient;
                $data['INR'] = $INR;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_LiverFunction_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Biochemistry") {
                $pg_fasting = $this->input->post('pg_fasting');
                $pg_after75 = $this->input->post('pg_after75');
                $pg_2h = $this->input->post('pg_2h');
                $cur_pg = $this->input->post('cur_pg');
                $cur_h = $this->input->post('cur_h');
                $SLP_total = $this->input->post('SLP_total');
                $SLP_ldl = $this->input->post('SLP_ldl');
                $SLP_hdl = $this->input->post('SLP_hdl');
                $SLP_tri = $this->input->post('SLP_tri');
                $SP_total = $this->input->post('SP_total');
                $SA = $this->input->post('SA');
                $SG = $this->input->post('SG');
                $AGR = $this->input->post('AGR');
                $BUN = $this->input->post('BUN');
                $SU = $this->input->post('SU');
                $SC = $this->input->post('SC');
                $SUA = $this->input->post('SUA');
                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'pg_fasting' => $pg_fasting,
                    'pg_after75' => $pg_after75,
                    'pg_2h' => $pg_2h,
                    'cur_pg' => $cur_pg,
                    'cur_h' => $cur_h,
                    'SLP_total' => $SLP_total,
                    'SLP_ldl' => $SLP_ldl,
                    'SLP_hdl' => $SLP_hdl,
                    'SLP_tri' => $SLP_tri,
                    'SP_total' => $SP_total,
                    'SA' => $SA,
                    'SG' => $SG,
                    'AGR' => $AGR,
                    'BUN' => $BUN,
                    'SU' => $SU,
                    'SC' => $SC,
                    'SUA' => $SUA,
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_biochemistry', $insert_data);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['pg_fasting'] = $pg_fasting;
                $data['pg_after75'] = $pg_after75;
                $data['pg_2h'] = $pg_2h;
                $data['cur_pg'] = $cur_pg;
                $data['cur_h'] = $cur_h;
                $data['SLP_total'] = $SLP_total;
                $data['SLP_ldl'] = $SLP_ldl;
                $data['SLP_hdl'] = $SLP_hdl;
                $data['SLP_tri'] = $SLP_tri;
                $data['SP_total'] = $SP_total;
                $data['SA'] = $SA;
                $data['SG'] = $SG;
                $data['AGR'] = $AGR;
                $data['BUN'] = $BUN;
                $data['SU'] = $SU;
                $data['SC'] = $SC;
                $data['SUA'] = $SUA;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_biochemistry_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Serum Electrolytes") {
                $na_plus = $this->input->post('na_plus');
                $k_plus = $this->input->post('k_plus');
                $cl = $this->input->post('cl');
                $tco_2 = $this->input->post('tco_2');
                $calcium = $this->input->post('calcium');
                $IP = $this->input->post('IP');
                $CCR = $this->input->post('CCR');
                $LDH = $this->input->post('LDH');

                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'na_plus' => $na_plus,
                    'k_plus' => $k_plus,
                    'cl' => $cl,
                    'tco_2' => $tco_2,
                    'calcium' => $calcium,
                    'IP' => $IP,
                    'CCR' => $CCR,
                    'LDH' => $LDH,
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_serum_electrolytes', $insert_data);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['na_plus'] = $na_plus;
                $data['k_plus'] = $k_plus;
                $data['cl'] = $cl;
                $data['tco_2'] = $tco_2;
                $data['calcium'] = $calcium;
                $data['IP'] = $IP;
                $data['CCR'] = $CCR;
                $data['LDH'] = $LDH;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_serum_electrolytes_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Kidney profile") {
                $bun = $this->input->post('bun');
                $serum_urea = $this->input->post('serum_urea');
                $serum_creatinine = $this->input->post('serum_creatinine');
                $serum_uric_acid = $this->input->post('serum_uric_acid');

                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'bun' => $bun,
                    'serum_urea' => $serum_urea,
                    'serum_creatinine' => $serum_creatinine,
                    'serum_uric_acid' => $serum_uric_acid,
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_kidney_profile', $insert_data);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['bun'] = $bun;
                $data['serum_urea'] = $serum_urea;
                $data['serum_creatinine'] = $serum_creatinine;
                $data['serum_uric_acid'] = $serum_uric_acid;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_kidney_profile_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Pregnancy Test") {
                $pregnancy_test = $this->input->post('pregnancy_test');

                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'pregnancy_test' => $pregnancy_test,
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_pregnancy_test', $insert_data);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['pregnancy_test'] = $pregnancy_test;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_pregnancy_test_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Cross matching") {
                $ABO_group = $this->input->post('ABO_group');
                $Rh_type = $this->input->post('Rh_type');
                $doner_name = $this->input->post('doner_name');
                $age = $this->input->post('age');
                $doner_abo = $this->input->post('doner_abo');
                $rh_types = $this->input->post('rh_types');
                $cross_matching = $this->input->post('cross_matching');
                $HBsAg = $this->input->post('HBsAg');
                $VDRL = $this->input->post('VDRL');

                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'ABO_group' => $ABO_group,
                    'Rh_type' => $Rh_type,
                    'doner_name' => $doner_name,
                    'doner_abo' => $doner_abo,
                    'rh_types' => $rh_types,
                    'cross_matching' => $cross_matching,
                    'HBsAg' => $HBsAg,
                    'VDRL' => $VDRL,
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_cross_matching', $insert_data);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['ABO_group'] = $ABO_group;
                $data['Rh_type'] = $Rh_type;
                $data['doner_name'] = $doner_name;
                $data['doner_abo'] = $doner_abo;
                $data['rh_types'] = $rh_types;
                $data['cross_matching'] = $cross_matching;
                $data['HBsAg'] = $HBsAg;
                $data['VDRL'] = $VDRL;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_cross_matching_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Blood Group") {
                $ABO_group = $this->input->post('ABO_group');
                $Rh_type = $this->input->post('Rh_type');

                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'ABO_group' => $ABO_group,
                    'Rh_type' => $Rh_type,
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_blood_group', $insert_data);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['ABO_group'] = $ABO_group;
                $data['Rh_type'] = $Rh_type;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_blood_group_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "CRP/ASO") {
                $CRP = $this->input->post('CRP');
                $ASO = $this->input->post('ASO');

                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'ASO' => $ASO,
                    'CRP' => $CRP,
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_crp_aso', $insert_data);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['CRP'] = $CRP;
                $data['ASO'] = $ASO;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_crp_aso_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Stool RME") {
                $consistency = $this->input->post('consistency');
                $color = $this->input->post('color');
                $mucus = $this->input->post('mucus');
                $blood = $this->input->post('blood');
                $reaction = $this->input->post('reaction');
                $occult_blood = $this->input->post('occult_blood');
                $reducing_substance = $this->input->post('reducing_substance');
                $larva = $this->input->post('larva');
                $trophozoite = $this->input->post('trophozoite');
                $cyst_a = $this->input->post('cyst_a');
                $cyst_b = $this->input->post('cyst_b');
                $ova_a = $this->input->post('ova_a');
                $ova_b = $this->input->post('ova_b');
                $vegetable_cells = $this->input->post('vegetable_cells');
                $muscle_cells = $this->input->post('muscle_cells');
                $fat_globules = $this->input->post('fat_globules');
                $starch_granules = $this->input->post('starch_granules');
                $RBC = $this->input->post('RBC');
                $pus_cells = $this->input->post('pus_cells');
                $epithelial_cells = $this->input->post('epithelial_cells');
                $others = $this->input->post('others');

                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'consistency' => $consistency,
                    'color' => $color,
                    'mucus' => $mucus,
                    'blood' => $blood,
                    'reaction' => $reaction,
                    'occult_blood' => $occult_blood,
                    'reducing_substance' => $reducing_substance,
                    'larva' => $larva,
                    'trophozoite' => $trophozoite,
                    'cyst_a' => $cyst_a,
                    'cyst_b' => $cyst_b,
                    'ova_a' => $ova_a,
                    'ova_b' => $ova_b,
                    'vegetable_cells' => $vegetable_cells,
                    'muscle_cells' => $muscle_cells,
                    'fat_globules' => $fat_globules,
                    'starch_granules' => $starch_granules,
                    'RBC' => $RBC,
                    'pus_cells' => $pus_cells,
                    'epithelial_cells' => $epithelial_cells,
                    'others' => $others,
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_stool_rme', $insert_data);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['consistency'] = $consistency;
                $data['color'] = $color;
                $data['mucus'] = $mucus;
                $data['blood'] = $blood;
                $data['reaction'] = $reaction;
                $data['occult_blood'] = $occult_blood;
                $data['reducing_substance'] = $reducing_substance;
                $data['larva'] = $larva;
                $data['trophozoite'] = $trophozoite;
                $data['cyst_a'] = $cyst_a;
                $data['cyst_b'] = $cyst_b;
                $data['ova_a'] = $ova_a;
                $data['ova_b'] = $ova_b;
                $data['vegetable_cells'] = $vegetable_cells;
                $data['muscle_cells'] = $muscle_cells;
                $data['fat_globules'] = $fat_globules;
                $data['starch_granules'] = $starch_granules;
                $data['RBC'] = $RBC;
                $data['pus_cells'] = $pus_cells;
                $data['epithelial_cells'] = $epithelial_cells;
                $data['others'] = $others;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_stool_rme_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Semen Analysis Report") {
                $volume = $this->input->post('volume');
                $color = $this->input->post('color');
                $viscosity = $this->input->post('viscosity');
                $method = $this->input->post('method');
                $total = $this->input->post('total');
                $morphology = $this->input->post('morphology');
                $motility = $this->input->post('motility');
                $other = $this->input->post('other');
                $pus_cells = $this->input->post('pus_cells');
                $RBC = $this->input->post('RBC');
                $in_motility = $this->input->post('in_motility');
                $comment = $this->input->post('comment');

                $insert_data = array(
                    'patient_id' => $patient_id,
                    'patient_name' => $patient_name,
                    'date' => $date,
                    'age' => $age,
                    'sex' => $sex,
                    'referenced_by' => $ref_by,
                    'volume' => $volume,
                    'color' => $color,
                    'viscosity' => $viscosity,
                    'method' => $method,
                    'total' => $total,
                    'morphology' => $morphology,
                    'motility' => $motility,
                    'other' => $other,
                    'pus_cells' => $pus_cells,
                    'RBC' => $RBC,
                    'in_motility' => $in_motility,
                    'comment' => $comment,
                    'test_inserted_id' => $test_inserted_id
                );
                $this->Common_model->insert_data('report_semen_analysis_report', $insert_data);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['volume'] = $volume;
                $data['color'] = $color;
                $data['viscosity'] = $viscosity;
                $data['method'] = $method;
                $data['total'] = $total;
                $data['morphology'] = $morphology;
                $data['motility'] = $motility;
                $data['other'] = $other;
                $data['pus_cells'] = $pus_cells;
                $data['RBC'] = $RBC;
                $data['in_motility'] = $in_motility;
                $data['comment'] = $comment;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_semen_analysis_report_print', $data);
                $this->load->view('admin/footer');
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
            }
            $data['test_id'] = $test_id;
            if ($test_category == "Haematology") {
                $test_res = $this->Common_model->get_allinfo_byid_array('report_haematology', 'test_inserted_id', $test_id);
                $data['patient_id'] = $test_res[0]['patient_id'];
                $data['patient_name'] = $test_res[0]['patient_name'];
                $data['date'] = $test_res[0]['date'];
                $data['age'] = $test_res[0]['age'];
                $data['sex'] = $test_res[0]['sex'];
                $data['referenced_by'] = $test_res[0]['referenced_by'];
                $data['hemoglobin'] = $test_res[0]['hemoglobin'];
                $data['esr'] = $test_res[0]['esr'];
                $data['total_wbc'] = $test_res[0]['total_wbc'];
                $data['neutrophils'] = $test_res[0]['neutrophils'];
                $data['lymphocytes'] = $test_res[0]['lymphocytes'];
                $data['monocytes'] = $test_res[0]['monocytes'];
                $data['eosinophils'] = $test_res[0]['eosinophils'];
                $data['basophils'] = $test_res[0]['basophils'];
                $data['others_cell'] = $test_res[0]['others_cell'];
                $data['total_eosinophils'] = $test_res[0]['total_eosinophils'];
                $data['platelet_count'] = $test_res[0]['platelet_count'];
                $data['mpv'] = $test_res[0]['mpv'];
                $data['pdw'] = $test_res[0]['pdw'];
                $data['pct'] = $test_res[0]['pct'];
                $data['rbc_count'] = $test_res[0]['rbc_count'];
                $data['hct_pcv'] = $test_res[0]['hct_pcv'];
                $data['mcv'] = $test_res[0]['mcv'];
                $data['mch'] = $test_res[0]['mch'];
                $data['mchc'] = $test_res[0]['mchc'];
                $data['rdw_cv'] = $test_res[0]['rdw_cv'];

                $this->load->view('admin/header');
                $this->load->view('admin/report_haematology_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "IMMUNOLOGY") {
                $test_res = $this->Common_model->get_allinfo_byid_array('report_haematology', 'test_inserted_id', $test_id);
                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['MP'] = $MP;
                $data['Method'] = $Method;
                $data['HbsAg'] = $HbsAg;
                $data['Method2'] = $Method2;
                $data['VDRL'] = $VDRL;
                $data['Method3'] = $Method3;
                $data['RA'] = $RA;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_IMMUNOLOGY_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "MT") {
                $test_res = $this->Common_model->get_allinfo_byid_array('report_haematology', 'test_inserted_id', $test_id);
                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['MT'] = $MT;
                $data['comment'] = $comment;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_MT_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "UrineRME") {
                $test_res = $this->Common_model->get_allinfo_byid_array('report_haematology', 'test_inserted_id', $test_id);
                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['quantity_px'] = $quantity_px;
                $data['color_px'] = $color_px;
                $data['appearance_px'] = $appearance_px;
                $data['sediment_px'] = $sediment_px;
                $data['specificgravity_px'] = $specificgravity_px;
                $data['reaction_cx'] = $reaction_cx;
                $data['excessphosphate_cx'] = $excessphosphate_cx;
                $data['albumin_cx'] = $albumin_cx;
                $data['sugar_cx'] = $sugar_cx;
                $data['crystals_mx'] = $crystals_mx;
                $data['calciumoxalate_mx'] = $calciumoxalate_mx;
                $data['uricacid_mx'] = $uricacid_mx;
                $data['triplephosphate_mx'] = $triplephosphate_mx;
                $data['sulphonamide_mx'] = $sulphonamide_mx;
                $data['cysteine_mx'] = $cysteine_mx;
                $data['cholesterol_mx'] = $cholesterol_mx;
                $data['puscell_mx'] = $puscell_mx;
                $data['epithelialcell_mx'] = $epithelialcell_mx;
                $data['RBC_mx'] = $RBC_mx;
                $data['casts_mx'] = $casts_mx;
                $data['amorphousphosphate_mx'] = $amorphousphosphate_mx;
                $data['others'] = $others;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_UrineRME_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Liverfunction-Biochemistry") {
                $test_res = $this->Common_model->get_allinfo_byid_array('report_haematology', 'test_inserted_id', $test_id);
                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['serum_bilirubin_total'] = $serum_bilirubin_total;
                $data['SGPT'] = $SGPT;
                $data['AST'] = $AST;
                $data['alkaline_phos'] = $alkaline_phos;
                $data['control'] = $control;
                $data['patient'] = $patient;
                $data['INR'] = $INR;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_LiverFunction_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Biochemistry") {
                $test_res = $this->Common_model->get_allinfo_byid_array('report_haematology', 'test_inserted_id', $test_id);
                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['pg_fasting'] = $pg_fasting;
                $data['pg_after75'] = $pg_after75;
                $data['pg_2h'] = $pg_2h;
                $data['cur_pg'] = $cur_pg;
                $data['cur_h'] = $cur_h;
                $data['SLP_total'] = $SLP_total;
                $data['SLP_ldl'] = $SLP_ldl;
                $data['SLP_hdl'] = $SLP_hdl;
                $data['SLP_tri'] = $SLP_tri;
                $data['SP_total'] = $SP_total;
                $data['SA'] = $SA;
                $data['SG'] = $SG;
                $data['AGR'] = $AGR;
                $data['BUN'] = $BUN;
                $data['SU'] = $SU;
                $data['SC'] = $SC;
                $data['SUA'] = $SUA;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_biochemistry_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Serum Electrolytes") {
                $test_res = $this->Common_model->get_allinfo_byid_array('report_haematology', 'test_inserted_id', $test_id);
                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['na_plus'] = $na_plus;
                $data['k_plus'] = $k_plus;
                $data['cl'] = $cl;
                $data['tco_2'] = $tco_2;
                $data['calcium'] = $calcium;
                $data['IP'] = $IP;
                $data['CCR'] = $CCR;
                $data['LDH'] = $LDH;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_serum_electrolytes_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Kidney profile") {
                $test_res = $this->Common_model->get_allinfo_byid_array('report_haematology', 'test_inserted_id', $test_id);
                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['bun'] = $bun;
                $data['serum_urea'] = $serum_urea;
                $data['serum_creatinine'] = $serum_creatinine;
                $data['serum_uric_acid'] = $serum_uric_acid;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_kidney_profile_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Pregnancy Test") {
                $test_res = $this->Common_model->get_allinfo_byid_array('report_haematology', 'test_inserted_id', $test_id);
                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['pregnancy_test'] = $pregnancy_test;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_pregnancy_test_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Cross matching") {
                $test_res = $this->Common_model->get_allinfo_byid_array('report_haematology', 'test_inserted_id', $test_id);
                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['ABO_group'] = $ABO_group;
                $data['Rh_type'] = $Rh_type;
                $data['doner_name'] = $doner_name;
                $data['doner_abo'] = $doner_abo;
                $data['rh_types'] = $rh_types;
                $data['cross_matching'] = $cross_matching;
                $data['HBsAg'] = $HBsAg;
                $data['VDRL'] = $VDRL;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_cross_matching_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Blood Group") {
                $test_res = $this->Common_model->get_allinfo_byid_array('report_haematology', 'test_inserted_id', $test_id);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['ABO_group'] = $ABO_group;
                $data['Rh_type'] = $Rh_type;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_blood_group_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "CRP/ASO") {
                $test_res = $this->Common_model->get_allinfo_byid_array('report_haematology', 'test_inserted_id', $test_id);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['CRP'] = $CRP;
                $data['ASO'] = $ASO;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_crp_aso_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Stool RME") {
                $test_res = $this->Common_model->get_allinfo_byid_array('report_haematology', 'test_inserted_id', $test_id);
                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['consistency'] = $consistency;
                $data['color'] = $color;
                $data['mucus'] = $mucus;
                $data['blood'] = $blood;
                $data['reaction'] = $reaction;
                $data['occult_blood'] = $occult_blood;
                $data['reducing_substance'] = $reducing_substance;
                $data['larva'] = $larva;
                $data['trophozoite'] = $trophozoite;
                $data['cyst_a'] = $cyst_a;
                $data['cyst_b'] = $cyst_b;
                $data['ova_a'] = $ova_a;
                $data['ova_b'] = $ova_b;
                $data['vegetable_cells'] = $vegetable_cells;
                $data['muscle_cells'] = $muscle_cells;
                $data['fat_globules'] = $fat_globules;
                $data['starch_granules'] = $starch_granules;
                $data['RBC'] = $RBC;
                $data['pus_cells'] = $pus_cells;
                $data['epithelial_cells'] = $epithelial_cells;
                $data['others'] = $others;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_stool_rme_print', $data);
                $this->load->view('admin/footer');
            }
            if ($test_category == "Semen Analysis Report") {
                $test_res = $this->Common_model->get_allinfo_byid_array('report_haematology', 'test_inserted_id', $test_id);

                $data['patient_id'] = $patient_id;
                $data['patient_name'] = $patient_name;
                $data['date'] = $date;
                $data['age'] = $age;
                $data['sex'] = $sex;
                $data['referenced_by'] = $ref_by;
                $data['volume'] = $volume;
                $data['color'] = $color;
                $data['viscosity'] = $viscosity;
                $data['method'] = $method;
                $data['total'] = $total;
                $data['morphology'] = $morphology;
                $data['motility'] = $motility;
                $data['other'] = $other;
                $data['pus_cells'] = $pus_cells;
                $data['RBC'] = $RBC;
                $data['in_motility'] = $in_motility;
                $data['comment'] = $comment;

                $this->load->view('admin/header');
                $this->load->view('admin/Test/report_semen_analysis_report_print', $data);
                $this->load->view('admin/footer');
            }
        } else {
            $data['wrong_msg'] = "";
            $this->load->view('website/login_check', $data);
        }
    }

}
