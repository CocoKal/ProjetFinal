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

		//BOOKING

		//Ajouter un booking dans la base de données
		public function add_booking($user_id,$room_id,$check_in,$check_out, $id_payment){
			$requete = $this->bd->prepare(
				"INSERT INTO booking (user_id,
														room_id,
														check_in,
														check_out,
														id_payment)


				VALUES (
							 :user_id,
 							 :room_id,
 							 :check_in,
 							 :check_out,
							 :id_payment)");

			$requete->bindValue(":user_id", $user_id);
			$requete->bindValue(":room_id", $room_id);
			$requete->bindValue(":check_in", $check_in);
			$requete->bindValue(":check_out", $check_out);
			$requete->bindValue(":id_payment", $id_payment);

			return $requete->execute();
		}

		//Récupérer tous les bookings
		public function get_all_booking()
		{
			$requete = $this->bd->prepare("SELECT * FROM booking ");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Récupérer les bookings d'un chambre
		public function get_all_booking_by_room_id($room_id, $check_in, $check_out) { //GET BOOKING FOR A SPECIFIC ROOM
			$string_requete = ("SELECT *
													FROM booking
													WHERE room_id = $room_id
													AND ((check_in <= '".$check_out."' AND check_out > '".$check_out."')
													OR (check_in <= '".$check_in."' AND check_out > '".$check_in."')
													OR ((check_in < '".$check_out."' AND check_in >= '".$check_in."') AND (check_out < '".$check_out."' AND check_out >= '".$check_out."'))
													OR (check_in < '".$check_in."' AND check_out > '".$check_out."'))");
			$requete = $this->bd->prepare($string_requete);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Récupérer les bookings d'un utilisateur
		public function get_all_booking_by_id_user($id_user) {
			$requete = $this->bd->prepare("SELECT * FROM booking WHERE user_id = ".$id_user." AND check_out > CURRENT_TIMESTAMP");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		public function get_booking_historic($id_user) {
			$requete = $this->bd->prepare("SELECT * FROM booking WHERE user_id = ".$id_user);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Supprimer un booking en fonction de l'id
		public function delete_booking_by_id($booking_id){
			$requete=$this->bd->prepare("DELETE
																	 FROM booking
																	 WHERE booking_id = ".$booking_id);

			$requete->execute();
	   }

		 //Changer l'id_payment sur un booking
		 public function set_id_payment($id_payment, $id_booking) {
			 $requete = $this->bd->prepare("UPDATE booking
				 															SET id_payment = '".$id_payment."'
																			WHERE booking_id = ".$id_booking);
			 $requete->execute();
			 return $requete->fetchAll(PDO::FETCH_ASSOC);
		 }

		//COMPLAINT

		//Ajouter un avis dans la base de données
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

		//Récupérer tous les avis
		public function get_all_complaint() { // GET ALL COMPLAINTS
			$requete = $this->bd->prepare("SELECT * FROM complaint");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//USER

		//Ajouter un utilisateur dans la base de données
		public function add_user($lastname,$firstname,$email,$password){  //ADD USER
			$requete = $this->bd->prepare(
				"INSERT INTO user (	lastname,
														firstname,
														email,
														password)
				VALUES 							(:lastname,
														:firstname,
														:email,
														:password)");


			$requete->bindValue(":lastname", $lastname);
			$requete->bindValue(":firstname", $firstname);
			$requete->bindValue(":email", $email);
			$requete->bindValue(":password", $password);

			return $requete->execute();
		}

		//Récupérer tous les utilisateurs
		public function get_all_user() {                 //GET_ALL_USERS
			$requete = $this->bd->prepare("SELECT * FROM user");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Supprimer un utilisateur
		public function delete_user($id,$email){     //DELETE USER BY ID AND EMAIL
			$requete=$this->bd->prepare("DELETE *
			FROM user
			WHERE id=$id AND(email=$email)");

			$requete->bindValue(":id", $id);
			$requete->bindValue(":email", $email);
			$requete->execute();
		}

		//Récupérer un utilisateur en fonction de son id
		public function get_user_by_id($id_user) {
			$requete = $this->bd->prepare("SELECT * FROM user WHERE id = ".$id_user);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Modifier un utilisateur
		public function modify_user($id,$lastname,$firstname,$email){
			$requete = $this->bd->prepare("UPDATE user SET lastname ='$lastname' ,firstname ='$firstname', email='$email' WHERE id ='$id' ");
			return $requete->execute();
		}



		//ROOM

		////Ajouter une chambre dans la base de données
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

		//Récupérer toutes les chambres
		public function get_all_room() {     //GET ALL ROOMS
			$requete = $this->bd->prepare("SELECT * FROM room");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Récupérer une chambre en fonction de son id
		public function get_room_by_id($id_room) {
			$requete = $this->bd->prepare("SELECT * FROM room WHERE room_id = ".$id_room);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Récupérer les chambres d'un hotel
		public function get_room_by_hotel_id($hotel_id)
		{
			$requete = $this->bd->prepare("SELECT * FROM room WHERE hotel_id = ".$hotel_id);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Récupérer les id des chambres d'un hotel
		public function get_room_id_by_hotel_id($hotel_id)
		{
			$requete = $this->bd->prepare("SELECT room_id FROM room WHERE hotel_id = ".$hotel_id);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Récupérer les id des chambres d'un hotel et d'un type
		public function get_room_by_hotel_id_and_type($hotel_id, $room_type) {
			$requete = $this->bd->prepare("SELECT * FROM room WHERE hotel_id = ".$hotel_id." AND room_type_id = ".$room_type);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//ROOM_TYPE

		//Ajouter un type de chambre dans la base de données
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

		//Récupérer tous les types de chambre
		public function get_all_room_type() {     //GET ALL ROOMS TYPES
			$requete = $this->bd->prepare("SELECT * FROM room_type");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Récupérer le type de chambre en fonction de son id
		public function get_room_type_by_id($room_type) {
			$requete = $this->bd->prepare("SELECT * FROM room_type WHERE room_type_id = ".$room_type);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}



		//STAFF

		//Ajouter un membre du staff dans la base de données
		public function add_staff($id_user,$staff_type_id){    //ADD EMPLOYE
			$requete = $this->bd->prepare(
				"INSERT INTO staff (id_user,
													staff_type_id,)
				VALUES 							(:id_user,
													:staff_type_id)");


			$requete->bindValue(":emp_name", $id_user);
			$requete->bindValue(":staff_type_id", $staff_type_id);
			return $requete->execute();
		}

		//Récupérer tous les membres du staff
		public function get_all_staff() {     //GET ALL STAFF
			$requete = $this->bd->prepare("SELECT * FROM staff");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Récupérer un membre du staff en fonction de son id
		public function get_staff_by_id_user($id_user) {
			$requete = $this->bd->prepare("SELECT * FROM staff WHERE id_user = ".$id_user);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//STAFF_TYPE

		//Ajouter un type de staff dans la base de données
		public function add_staff_type($staff_type){     //ADD STAFF TYPE
			$requete = $this->bd->prepare(
				"INSERT INTO staff_type (staff_type)
				VALUES 							(:staff_type)");

			$requete->bindValue(":staff_type", $staff_type);
			return $requete->execute();
		}

		//Récupérer tous les type de membre du staff
		public function get_all_staff_type() {     //GET ALL STAFF TYPES
			$requete = $this->bd->prepare("SELECT * FROM staff_type");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//ADMIN

		//Ajouter un admin dans la base de données
		public function add_admin($id_user){
			$requete = $this->bd->prepare(
				"INSERT INTO admin (id_user)
				VALUES 							(:id_user)");

			$requete->bindValue(":id_user", id_user);
			return $requete->execute();
		}

		//Récupérer un admin en fonction de son id_user
		public function get_admin_id_by_user($id_user) {
			$requete = $this->bd->prepare("SELECT * FROM admin WHERE id_user = ".$id_user);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Renvois un boollean, vrai si l'utilisateur est un admin
		public function check_if_admin($id_user) {
			$requete = $this->bd->prepare("SELECT * FROM admin WHERE id_user = ".$id_user);
			$requete->execute();
			$admin = $requete->fetchAll(PDO::FETCH_ASSOC);
			return !empty($admin);
		}

		//HOTEL

		//Ajouter un hotel dans la base de données
		public function add_hotel($country, $city) {
			$requete = $this->bd->prepare(
				"INSERT INTO hotel (hotel_localisation_country, hotel_localisation_city)
				VALUES 							(:hotel_localisation_country,
														:hotel_localisation_city)");

				$requete->bindValue(":hotel_localisation_country", $country);
				$requete->bindValue(":hotel_localisation_city", $city);
				return $requete->execute();
		}

		//Récupérer tous les hotels
		public function get_all_hotels() {
			$requete = $this->bd->prepare("SELECT * FROM hotel");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Récupérer un hotel par rapport à sa localisation
		public function get_hotel_by_localisation($localisation) {
			$requete = $this->bd->prepare("SELECT *
																		FROM hotel
																		WHERE hotel_localisation_country LIKE '".$localisation."'
																		OR hotel_localisation_city LIKE '".$localisation."'" );

			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Récupérer un hotel en fonction de son id
		public function get_hotel_by_id($id) {
			$requete = $this->bd->prepare("SELECT *
																		FROM hotel
																		WHERE hotel_id = ".$id );

			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Récupérer les hotels par rapport à leur manager
		public function get_hotel_by_manager_id($emp_id) {
			$requete = $this->bd->prepare("SELECT *
																		FROM hotel
																		WHERE manager_id = ".$emp_id );

			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Récupérer le compte des clients d'un hotel
		public function get_count_clients_in_hotel_by_id($id){
			$requete = $this->bd->prepare("SELECT count(*) FROM booking,room WHERE booking.room_id = room.room_id AND room.hotel_id = ".$id." AND booking.check_in < CURRENT_TIMESTAMP AND booking.check_out > CURRENT_TIMESTAMP");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//SERVICES

		//Ajouter un service dans la base de données
		public function add_service($name) {
			$requete = $this->bd->prepare(
				"INSERT INTO services (name)
				VALUES 							(:name)");

				$requete->bindValue(":name", $name);
				return $requete->execute();
		}

		//Récupérer tous les services
		public function get_all_services() {
			$requete = $this->bd->prepare("SELECT * FROM service");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Récupérer un service en fonction de son id
		public function get_service_by_id($id_service){
			$requete = $this->bd->prepare("SELECT * FROM service WHERE id_service = ".$id_service);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}


		//HOTEL_SERVICES

		//Ajouter un hotel_service dans la base de données
		public function add_hotel_service($hotel_id, $service_id) {
			$requete = $this->bd->prepare(
				"INSERT INTO service (hotel_id, service_id)
				VALUES 							(:hotel_id,
														:service_id)");

				$requete->bindValue(":hotel_id", $hotel_id);
				$requete->bindValue(":service_id", $service_id);
				return $requete->execute();
		}

		//Récupérer tous les service d'hotel
		public function get_all_hotel_services() {
			$requete = $this->bd->prepare("SELECT * FROM hotel_service");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Récupérer un hotel_service en fonction de son hotel_id
		public function get_all_hotel_services_by_hotel_id($hotel_id) {
			$requete = $this->bd->prepare("SELECT * FROM hotel_service WHERE hotel_id = ".$hotel_id);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//HOTEL_DESCRIPTION

		//Ajouter une description d'hotel dans la base de données
		public function add_hotel_description($hotel_id, $quote, $description) {
			$requete = $this->bd->prepare(
				"INSERT INTO services (hotel_id,
															quote,
															description)
				VALUES 							 (:hotel_id,
															:quote,
															:description)");

				$requete->bindValue(":hotel_id", $hotel_id);
				$requete->bindValue(":quote", $quote);
				$requete->bindValue(":description", $description);
				return $requete->execute();
		}

		//Récupérer toutes les descriptions d'hotel
		public function get_hotel_description_by_id($hotel_id) {
			$requete = $this->bd->prepare("SELECT * FROM hotel_description WHERE id_hotel = ".$hotel_id);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//PAYMENT

		//Ajouter un paiement dans la base de données
		public function add_payment($id_user, $name_card, $number_card, $date_card, $amount_rooms, $amount_services, $code) {
			$requete = $this->bd->prepare(
				"INSERT INTO payment (id_user,
															name_card,
															number_card,
															date_card,
															amount_rooms,
															amount_services,
															code)
				VALUES 							 (:id_user,
															:name_card,
															:number_card,
															:date_card,
															:amount_rooms,
															:amount_services,
															:code)");

				$requete->bindValue(":id_user", $id_user);
				$requete->bindValue(":name_card", $name_card);
				$requete->bindValue(":number_card", $number_card);
				$requete->bindValue(":date_card", $date_card);
				$requete->bindValue(":amount_rooms", $amount_rooms);
				$requete->bindValue(":amount_services", $amount_services);
				$requete->bindValue(":code", $code);
				return $requete->execute();
		}

		//Récupérer tous les paiements
		public function get_all_payment() {
			$requete = $this->bd->prepare("SELECT * FROM payment");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Récupérer un paiement en fonction de son id
		public function get_payment_by_id($id_payment) {
			$requete = $this->bd->prepare("SELECT * FROM payment WHERE id_payment = ".$id_payment);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//Récupérer les paiements d'un utilisateur
		public function get_payment_of_user($id_user) {
			$requete = $this->bd->prepare("SELECT * FROM payment WHERE id_user = ".$id_user);
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

}

?>
