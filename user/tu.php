select tbl_user.user_id, tbl_user.name,
 tbl_ride.ride_id, tbl_ride.ride_date, 
 tbl_ride.fromlocation, tbl_ride.tolocation, 
 tbl_ride.total_distance, tbl_ride.luggage, 
 tbl_ride.total_fare, tbl_ride.cab_type 
 from tbl_ride inner join tbl_user on tbl_ride.customer_user_id = 
 tbl_user.user_id where tbl_ride.status = 2