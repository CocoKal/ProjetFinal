<?php
	class Model{
		private $bd;
		public function __construct(){
			//Pour récupérer les valeurs $login et $password (BD CONNECTION) OK !!
			$login="root";
			$password="";
			try{
				$this->bd = new PDO('mysql:host=localhost;dbname=site',$login,$password);
				$this->bd->query('set NAMES utf8');
				$this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e){
				die("Erreur numéro " . $e->getCode() . " : " . $e->getMessage());
			}
		}

		//BOOKING OK !!

		public function add_booking($user_id,$room_id,$booking_date,$check_in,$check_out,$payment_status){		//ADD BOOKING OPERATION
			$requete = $this->bd->prepare(
				"INSERT INTO booking (user_id,
														room_id,
														booking_date,
														check_in,
														check_out,
														payment_status)
												
														
				VALUES (     
							 :user_id,
 							 :room_id,
 							 :booking_date,
 							 :check_in,
 							 :check_out,
 							 :payment_status)");

			//$requete->bindValue(":booking_id", $booking_id);
			$requete->bindValue(":user_id", $user_id);
			$requete->bindValue(":room_id", $room_id);
			$requete->bindValue(":booking_date", $booking_date);
			$requete->bindValue(":check_in", $check_in);
			$requete->bindValue(":check_out", $check_out);
			$requete->bindValue(":payment_status", $payment_status);

			return $requete->execute();
		}

		public function get_all_booking()             //GET ALL BOOKING
		{
			$requete = $this->bd->prepare("SELECT * FROM booking ");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		public function get_all_booking_by_room_id($room_id, $check_in, $check_out) { //GET BOOKING FOR A SPECIFIC ROOM
			$string_requete = ("SELECT *
			FROM booking
			WHERE room_id = $room_id
			AND (
			(check_in <= '".$check_out."' AND check_out > '".$check_out."')
			OR (check_in <= '".$check_in."' AND check_out > '".$check_in."')
			OR ((check_in < '".$check_out."' AND check_in >= '".$check_in."') AND (check_out < '".$check_out."' AND check_out >= '".$check_out."'))
			OR (check_in < '".$check_in."' AND check_out > '".$check_out."')
			)");
			$requete = $this->bd->prepare($string_requete);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		public function delete_booking($booking_id,$user_id){           //DELETE BOOKING BY ID_BOOKING AND ID_USER
			$requete=$this->bd->prepare("DELETE *
			FROM booking
			WHERE booking_id=$booking_id AND(user_id=$user_id)");

			$requete->bindValue(":booking_id", $booking_id);
			$requete->bindValue(":user_id", $user_id);
			$requete->execute();

	   }

		//COMPLAINT OK !!


		public function add_complaint($id_user,$grade,$title_complainte,$complaint,$created_at){ //ADD COMPLAINT
			$requete = $this->bd->prepare(
				"INSERT INTO complaint (
														id_user,
														grade,
														title_complainte,
														complaint,
														created_at)
				VALUES 							(
														:id_user,
														:grade,
														:title_complainte,
														:complaint,
														:created_at)");


			$requete->bindValue(":id_user", $id_user);
			$requete->bindValue(":grade", $grade);
			$requete->bindValue(":title_complainte", $title_complainte);
			$requete->bindValue(":complaint", $complaint);
			$requete->bindValue(":created_at", $created_at);
			return $requete->execute();
		}

		public function get_all_complaint() { // GET ALL COMPLAINTS
			$requete = $this->bd->prepare("SELECT * FROM complaint");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//USER

		public function add_user($lastname,$firstname,$email,$password,$created_at){  //ADD USER
			$requete = $this->bd->prepare(
				"INSERT INTO user (
														lastname,
														firstname,
														email,
														password,
														
														created_at)
				VALUES 							(
														:lastname,
														:firstname,
														:email,
														:password,
														
														:created_at)");


			$requete->bindValue(":lastname", $lastname);
			$requete->bindValue(":firstname", $firstname);
			$requete->bindValue(":email", $email);
			$requete->bindValue(":password", $password);
			$requete->bindValue(":created_at", $created_at);

			return $requete->execute();
		}

		public function get_all_users() {                 //GET_ALL_USERS
			$requete = $this->bd->prepare("SELECT * FROM user");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		public function delete_user($id,$email){     //DELETE USER BY ID AND EMAIL
			$requete=$this->bd->prepare("DELETE *
			FROM user
			WHERE id=$id AND(email=$email)");

			$requete->bindValue(":id", $id);
			$requete->bindValue(":email", $email);
			$requete->execute();
		}





		//ROOM

		public function add_room($room_type_id,$room_no,$hotel_id){  //ADD ROOM
			$requete = $this->bd->prepare(
				"INSERT INTO room (
														room_type_id,
														room_no,
														hotel_id
														)
				VALUES 							(
														:room_type_id,
														:room_no,
														:hotel_id,
														)");


			$requete->bindValue(":room_type_id", $room_type_id);
			$requete->bindValue(":room_no", $room_no);
			$requete->bindValue(":hotel_id", $hotel_id);

			return $requete->execute();
		}

		public function get_all_room() {     //GET ALL ROOMS
			$requete = $this->bd->prepare("SELECT * FROM room");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		public function get_room_by_hotel_id($hotel_id)
		{
			$requete = $this->bd->prepare("SELECT * FROM room WHERE hotel_id = ".$hotel_id);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		public function get_room_id_by_hotel_id($hotel_id)
		{
			$requete = $this->bd->prepare("SELECT room_id FROM room WHERE hotel_id = ".$hotel_id);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		public function get_room_by_hotel_id_and_type($hotel_id, $room_type) {
			$requete = $this->bd->prepare("SELECT * FROM room WHERE hotel_id = ".$hotel_id." AND room_type_id = ".$room_type);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//ROOM_TYPE

		public function add_room_type($room_type,$got_tel,$got_tv,$price,$nbr_bed){     //ADD ROOM TYPE
			$requete = $this->bd->prepare(
				"INSERT INTO room_type (room_type,
                                                     got_tel,
                                                     got_tv,
														price,
														nbr_bed)
				VALUES 							(:room_type,
				                                 :got_tel,
				                                 :got_tv,
				                                 
														:price,
														:nbr_bed)");


			$requete->bindValue(":room_type", $room_type);
			$requete->bindValue(":got_tel", $got_tel);
			$requete->bindValue(":got_tv", $got_tv);
			$requete->bindValue(":price", $price);
			$requete->bindValue(":nbr_bed", $nbr_bed);
			return $requete->execute();
		}

		public function get_all_room_type() {     //GET ALL ROOMS TYPES
			$requete = $this->bd->prepare("SELECT * FROM room_type");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}



		//STAFF


		public function add_staff($emp_name,$staff_type_id,$address,$contact_no,$salary){    //ADD EMPLOYE
			$requete = $this->bd->prepare(
				"INSERT INTO staff (
													emp_name,
													staff_type_id,
												
													address,
													contact_no,
													salary)
				VALUES 							(
													:emp_name,
													:staff_type_id,
													
													
													
													:address,
													:contact_no,
													:salary)");


			$requete->bindValue(":emp_name", $emp_name);
			$requete->bindValue(":staff_type_id", $staff_type_id);

			$requete->bindValue(":address", $address);
			$requete->bindValue(":contact_no", $contact_no);
			$requete->bindValue(":salary", $salary);
			return $requete->execute();
		}

		public function get_all_staff() {     //GET ALL STAFF
			$requete = $this->bd->prepare("SELECT * FROM staff");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//STAFF_TYPE

		public function add_staff_type($staff_type_id,$staff_type){     //ADD STAFF TYPE
			$requete = $this->bd->prepare(
				"INSERT INTO staff_type (staff_type_id,
														staff_type)
				VALUES 							(:staff_type_id,
														:staff_type)");

			$requete->bindValue(":staff_type_id", $staff_type_id);
			$requete->bindValue(":staff_type", $staff_type);
			return $requete->execute();
		}

		public function get_all_staff_type() {     //GET ALL STAFF TYPES
			$requete = $this->bd->prepare("SELECT * FROM staff_type");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}



		public function get_all_user() {
			$requete = $this->bd->prepare("SELECT * FROM user");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		public function get_user_by_id($id_user) {
			$requete = $this->bd->prepare("SELECT * FROM user WHERE id = ".$id_user);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}


		//ADMIN

		public function add_admin($id_user){
			$requete = $this->bd->prepare(
				"INSERT INTO admin (id_user)
				VALUES 							(:id_user)");

			$requete->bindValue(":id_user", id_user);
			return $requete->execute();
		}

		public function get_admin_id_by_user($id_user) {
			$requete = $this->bd->prepare("SELECT * FROM admin WHERE id_user = ".$id_user);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//HOTEL

		public function add_hotel($country, $city) {
			$requete = $this->bd->prepare(
				"INSERT INTO hotel (hotel_localisation_country, hotel_localisation_city)
				VALUES 							(:hotel_localisation_country,
														:hotel_localisation_city)");

				$requete->bindValue(":hotel_localisation_country", $country);
				$requete->bindValue(":hotel_localisation_city", $city);
				return $requete->execute();
		}

		public function get_all_hotels() {
			$requete = $this->bd->prepare("SELECT * FROM hotel");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		public function get_hotel_by_localisation($localisation) {
			$requete = $this->bd->prepare("SELECT *
																		FROM hotel
																		WHERE hotel_localisation_country LIKE '".$localisation."'
																		OR hotel_localisation_city LIKE '".$localisation."'" );

			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		public function get_hotel_by_id($id) {
			$requete = $this->bd->prepare("SELECT *
																		FROM hotel
																		WHERE hotel_id = ".$id );

			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//SERVICES

		public function add_service($name) {
			$requete = $this->bd->prepare(
				"INSERT INTO services (name)
				VALUES 							(:name)");

				$requete->bindValue(":name", $name);
				return $requete->execute();
		}

		public function get_all_services() {
			$requete = $this->bd->prepare("SELECT * FROM service");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}


		//HOTEL_SERVICES

		public function add_hotel_service($hotel_id, $service_id) {
			$requete = $this->bd->prepare(
				"INSERT INTO services (hotel_id, service_id)
				VALUES 							(:hotel_id,
														:service_id)");

				$requete->bindValue(":hotel_id", $hotel_id);
				$requete->bindValue(":service_id", $service_id);
				return $requete->execute();
		}

		public function get_all_hotel_services() {
			$requete = $this->bd->prepare("SELECT * FROM hotel_service");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		public function get_all_hotel_services_by_hotel_id($hotel_id) {
			$requete = $this->bd->prepare("SELECT * FROM hotel_service WHERE hotel_id = ".$hotel_id);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

}

?>
