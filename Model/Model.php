<?php
	class Model{
		private $bd;
		public function __construct(){
			//Pour récupérer les valeurs $login et $password
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

		public function add_booking($booking_id,$customer_id,$room_id,$check_in,$check_out,$total_price,$remaining_price,$payment_status){
			$requete = $this->bd->prepare(
				"INSERT INTO booking (booking_id,
														customer_id,
														room_id,
														check_in,
														check_out,
														total_price,
														remaining_price,
														payment_status)
				VALUES (:booking_id,
 							 :customer_id,
 							 :room_id,
 							 :check_in,
 							 :check_out,
 							 :total_price,
 							 :remaining_price,
 							 :payment_status)");

			$requete->bindValue(":booking_id", $booking_id);
			$requete->bindValue(":customer_id", $customer_id);
			$requete->bindValue(":room_id", $room_id);
			$requete->bindValue(":check_in", $check_in);
			$requete->bindValue(":check_out", $check_out);
			$requete->bindValue(":total_price", $total_price);
			$requete->bindValue(":remaining_price", $remaining_price);
			$requete->bindValue(":payment_status", $payment_status);

			return $requete->execute();
		}

		public function get_all_booking() {
			$requete = $this->bd->prepare("SELECT * FROM booking");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//COMPLAINT


		public function add_complaint($id,$complainant_name,$complaint_type,$complaint,$resolve_status,$budget){
			$requete = $this->bd->prepare(
				"INSERT INTO complaint (id,
														complainant_name,
														complaint_type,
														complaint,
														resolve_status,
														budget)
				VALUES 							(:id,
														:complainant_name,
														:complaint_type,
														:complaint,
														:resolve_status,
														:budget)");

			$requete->bindValue(":id", $id);
			$requete->bindValue(":complainant_name", $complainant_name);
			$requete->bindValue(":complaint_type", $complaint_type);
			$requete->bindValue(":complaint", $complaint);
			$requete->bindValue(":resolve_status", $resolve_status);
			$requete->bindValue(":budget", $budget);
			return $requete->execute();
		}

		public function get_all_complaint() {
			$requete = $this->bd->prepare("SELECT * FROM complaint");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//CUSTOMER

		public function add_customer($customer_id,$customer_name,$contact_no,$email,$id_card_type_id,$id_card_no,$address){
			$requete = $this->bd->prepare(
				"INSERT INTO customer (customer_id,
														customer_name,
														contact_no,
														email,
														id_card_type_id,
														id_card_no,
														address)
				VALUES 							(:customer_id,
														:customer_name,
														:contact_no,
														:email,
														:id_card_type_id,
														:id_card_no,
														:address)");

			$requete->bindValue(":customer_id", $customer_id);
			$requete->bindValue(":customer_name", $customer_name);
			$requete->bindValue(":contact_no", $contact_no);
			$requete->bindValue(":email", $email);
			$requete->bindValue(":id_card_type_id", $id_card_type_id);
			$requete->bindValue(":id_card_no", $id_card_no);
			$requete->bindValue(":address", $address);
			return $requete->execute();
		}

		public function get_all_customer() {
			$requete = $this->bd->prepare("SELECT * FROM customer");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//EMP_HISTORY

		public function add_emp_history($id,$emp_id,$shift_id,$to_date){
			$requete = $this->bd->prepare(
				"INSERT INTO emp_history (id,
														emp_id,
														shift_id,
														to_date)
				VALUES 							(:id,
														:emp_id,
														:shift_id,
														:to_date)");

			$requete->bindValue(":id", $id);
			$requete->bindValue(":emp_id", $emp_id);
			$requete->bindValue(":shift_id", $shift_id);
			$requete->bindValue(":to_date", $to_date);
			return $requete->execute();
		}

		public function get_all_emp_history() {
			$requete = $this->bd->prepare("SELECT * FROM emp_history");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//ID_CARD_TYPE


		public function add_id_card_type($id_card_type_id,$id_card_type){
			$requete = $this->bd->prepare(
				"INSERT INTO id_card_type (id_card_type_id,
														id_card_typee)
				VALUES 							(:id_card_type_id,
														:id_card_type)");

			$requete->bindValue(":id_card_type_id", $id_card_type_id);
			$requete->bindValue(":id_card_type", $id_card_type);
			return $requete->execute();
		}

		public function get_all_id_card_type() {
			$requete = $this->bd->prepare("SELECT * FROM id_card_type");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//ROOM

		public function add_room($room_id,$room_type_id,$room_no,$status,$check_in_status,$check_out_status){
			$requete = $this->bd->prepare(
				"INSERT INTO room (room_id,
														room_type_id,
														room_no,
														status,
														check_in_status,
														check_out_status)
				VALUES 							(:room_id,
														:room_type_id,
														:room_no,
														:status,
														:check_in_status,
														:check_out_status)");

			$requete->bindValue(":room_id", $room_id);
			$requete->bindValue(":room_type_id", $room_type_id);
			$requete->bindValue(":room_no", $room_no);
			$requete->bindValue(":status", $status);
			$requete->bindValue(":check_in_status", $check_in_status);
			$requete->bindValue(":check_out_status", $check_out_status);
			return $requete->execute();
		}

		public function get_all_room() {
			$requete = $this->bd->prepare("SELECT * FROM room");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//ROOM_TYPE

		public function add_room_type($room_type_id,$room_type,$price,$max_person){
			$requete = $this->bd->prepare(
				"INSERT INTO room_type (room_type_id,
														room_type,
														price,
														max_person)
				VALUES 							(:room_type_id,
														:room_type,
														:price,
														:max_person)");

			$requete->bindValue(":room_type_id", $room_type_id);
			$requete->bindValue(":room_type", $room_type);
			$requete->bindValue(":price", $price);
			$requete->bindValue(":max_person", $max_person);
			return $requete->execute();
		}

		public function get_all_room_type() {
			$requete = $this->bd->prepare("SELECT * FROM room_type");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//SHIFT


		public function add_shift($shift_id,$shift,$shift_timing){
			$requete = $this->bd->prepare(
				"INSERT INTO shift (shift_id,
														shift,
														shift_timing)
				VALUES 							(:shift_id,
														:shift,
														:shift_timing)");

			$requete->bindValue(":shift_id", $shift_id);
			$requete->bindValue(":shift", $shift);
			$requete->bindValue(":shift_timing", $shift_timing);
			return $requete->execute();
		}

		public function get_all_shift() {
			$requete = $this->bd->prepare("SELECT * FROM shift");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//STAFF


		public function add_staff($emp_id,$emp_name,$staff_type_id,$shift_id,$id_card_type,$id_card_no,$address,$contact_no,$salary){
			$requete = $this->bd->prepare(
				"INSERT INTO staff (emp_id,
													emp_name,
													staff_type_id,
													shift_id,
													id_card_type,
													id_card_no,
													address,
													contact_no,
													salary)
				VALUES 							(:emp_id,
													:emp_name,
													:staff_type_id,
													:shift_id,
													:id_card_type,
													:id_card_no,
													:address,
													:contact_no,
													:salary)");

			$requete->bindValue(":emp_id", $emp_id);
			$requete->bindValue(":emp_name", $emp_name);
			$requete->bindValue(":staff_type_id", $staff_type_id);
			$requete->bindValue(":shift_id", $shift_id);
			$requete->bindValue(":id_card_type", $id_card_type);
			$requete->bindValue(":id_card_no", $id_card_no);
			$requete->bindValue(":address", $address);
			$requete->bindValue(":contact_no", $contact_no);
			$requete->bindValue(":salary", $salary);
			return $requete->execute();
		}

		public function get_all_staff() {
			$requete = $this->bd->prepare("SELECT * FROM staff");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//STAFF_TYPE

		public function add_staff_type($staff_type_id,$staff_type){
			$requete = $this->bd->prepare(
				"INSERT INTO staff_type (staff_type_id,
														staff_type)
				VALUES 							(:staff_type_id,
														:staff_type)");

			$requete->bindValue(":staff_type_id", $staff_type_id);
			$requete->bindValue(":staff_type", $staff_type);
			return $requete->execute();
		}

		public function get_all_staff_type() {
			$requete = $this->bd->prepare("SELECT * FROM staff_type");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

		//USER


		public function add_user($name,$username,$email,$password){
			$requete = $this->bd->prepare(
				"INSERT INTO user (lastname,
													firstname,
													email,
													password)
				VALUES 							(:name,
													:username,
													:email,
													:password)");

			$requete->bindValue(":name", $name);
			$requete->bindValue(":username", $username);
			$requete->bindValue(":email", $email);
			$requete->bindValue(":password", $password);
			return $requete->execute();
		}

		public function get_all_user() {
			$requete = $this->bd->prepare("SELECT * FROM user");
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}

}

?>
