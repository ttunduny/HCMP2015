CREATE DEFINER=`root`@`localhost` PROCEDURE `get_facility_data`(FacilityID INT(11))
BEGIN 
	-- facility_stock_status
    -- Table is empty
    
	-- facility_stocks_temp
    SELECT * FROM facility_stocks_temp
    WHERE facility_code = FacilityID;
    
    
    -- facility_transactions_table
    SELECT * FROM facility_transaction_table
    WHERE facility_code = FacilityID;
    
    
    -- facility_user_log
    SELECT * FROM facility_user_log
    WHERE facility_code = FacilityID;
    
    
    -- malaria_data
    SELECT * FROM malaria_data
    WHERE facility_id = FacilityID;
    
    
    -- messages
    SELECT * FROM messages
    WHERE facility_code = FacilityID;
    
    
    -- patient_details
    SELECT * FROM patient_details
    WHERE facility_code = FacilityID;
    
    
    -- recepients
    -- Does not have facility_id or facility_code
    
	
    -- reversals
    SELECT * FROM reversals 
    WHERE facility_code = FacilityID;
    
    
    -- rh_drugs_data
    SELECT * FROM rh_drugs_data
    WHERE facility_id = FacilityID;
    
    -- service_point_stocks
    SELECT * FROM service_point_stocks
    WHERE facility_code = FacilityID;
    
END