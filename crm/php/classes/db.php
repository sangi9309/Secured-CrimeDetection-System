<?php

	class pdo_database{
		private $db_conn;
		//private $stmt;
		
		public function __construct(){
			try{
			$this ->db_conn = new PDO('mysql:host=localhost;dbname=crmdata',"root","");
			return $this->db_conn;
			}
			catch(PDOException $e){
				echo "Could not connect to database. Check you database parameters";
			}
		}
		
		public function report_crime($data){
			$sql = "INSERT INTO crimes(Category,Description,Crime_Scene,date) VALUES(?,?,?,?)";
			$this -> stmt = $this->db_conn->prepare($sql);
			
			
			extract($data);
			
			$location = "State:".$county.", City:".$sub_county." Area:, ".$street."";
			
			$this->stmt->execute(
				array(
					"$crime_type",
					"$crime_description",
					"$location",
					"$date"
				));
			return $this->db_conn-> lastInsertId();
		
		}
		
		public function apply($data){
			$sql = "INSERT INTO applications(ID_Number,Type)VALUES(?,?)";
			$stmt = $this->db_conn->prepare($sql);
			
			extract($data);
		
			
			$stmt -> execute(
				array($national_id,$type
				)
			);
			
			return $this->db_conn->lastInsertId();
		}
		
		public function report($data){
			$sql = "INSERT INTO items(Description,Last_Seen,Item_Name,category) VALUES(?,?,?,?)";
			$this -> stmt = $this->db_conn->prepare($sql);
			
			extract($data);
			
			$this->stmt->execute(
				array(
					"$item_description",
					"$last_seen",
					"$item_name",
					"$category"
					
				));
				
			return $this->db_conn->lastInsertId();
			
		}

		
public function getDetailedInfocrime($id){
			$sql = "SELECT * FROM crimes, users WHERE Crime_No = '$id' and users.id=crimes.reporterid";
			
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute();
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
		
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b> Suspects:</b></td><td><input style="color:grey;"type="text" value="'.$rows[0]['Crime_No'].'" name="Crime_No" readonly></td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Category:</b></td><td>'.$rows[0]['Category'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Date:</b></td><td>'.$rows[0]['date'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b> Description:</b></td><td>'.$rows[0]['Description'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b> Location:</b></td><td>'.$rows[0]['Crime_Scene'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b> Reporter Name:</b></td><td>'.$rows[0]['name'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b> Reporter Mobile No.:</b></td><td>'.$rows[0]['mobile'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b> Reporter Address:</b></td><td>'.$rows[0]['address'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b> Suspects:</b></td><td><input style="width:80%;"type="text" value="'.$rows[0]['Suspects'].'" name="Suspects"></td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b> Remarks:</b></td><td><input style="width:80%;" type="text" value="'.$rows[0]['remarks'].'" name="remarks"></td></tr>';
					
			}
				
			}
			return;
		}
		
		public function set_missing_person($data){
			$sql = "INSERT INTO missing_persons(fullName,Address,phoneNumber,date,Description,Image) VALUES(?,?,?,?,?,?)";
			
			$this -> stmt = $this->db_conn->prepare($sql);
			extract($data);
			
		   $this->stmt->execute(
				array(
					"$fullName",
					"$Address",
					"$phoneNumber",
					"$date",
					"$Description",
					"$Image"
				));
			
				
			return $this->db_conn->lastInsertId();
		}
		
		public function set_missing_vehicle($data){
			extract($data);	
			
			$sql = "INSERT INTO missing_vehicles(Number_plate,Model,Owner,phoneNumber,national_id,description,image) VALUES(?,?,?,?,?,?,?)";
			
			$this -> stmt = $this->db_conn -> prepare($sql);
			
			 $result = $this->stmt->execute( array(
					"$Number_plate",
					"$Model",
					"$Owner",
					"$phoneNumber",
					"$national_id",
					"$description",
					"$image"
					)
				);
				
				if($result){
					return true;	
				}
				else{
					return false;
				}	
		}
		
		public function set_missing_vehicle_found($data){
			extract($data);	
			
			$sql = "INSERT INTO missing_vehicles_found(Number_plate,Model,location_seen,phoneNumber,national_id,description,image) VALUES(?,?,?,?,?,?,?)";
			
			$this -> stmt = $this->db_conn -> prepare($sql);
			
			 $result = $this->stmt->execute( array(
					"$Number_plate",
					"$Model",
					"$location_seen",
					"$phoneNumber",
					"$national_id",
					"$description",
					"$image"
					)
				);
				
				if($result){
					return true;	
				}
				else{
					return false;
				}	
		}
		
		public function set_missing_person_found($full){
			$sql =  "UPDATE missing_persons SET Status = 'Found' WHERE fullName = '$full' AND status = 'Not Found'";
			
				$this -> stmt = $this -> db_conn -> prepare($sql);
				$results = $this -> stmt -> execute();
				
				if($results){
					$rows_affected = $this -> stmt ->rowCount();
					
					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}
		}
		
		public function get_crimes(){
			$sql = "SELECT Status,Category,Description,Crime_Scene,Suspects FROM crimes ";
			$stmt = $this->db_conn->prepare($sql);
			$stmt->execute();
			$crimes = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $crimes;
		}
		
		
		
		public function get_abstract_application(){
			$sql = "SELECT ID_Number,Type FROM applications";
			$stmt = $this->db_conn->prepare($sql);
			$stmt->execute();
			$applications = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $applications;
		}
		
		public function getDetailedInfo($id){
			$sql = "SELECT firstName,lastName,middleName,ID_Number,County,location FROM persons WHERE ID_Number = :id_number";
			$stmt = $this->db_conn->prepare($sql);
			$stmt->execute(
				array(
				':id_number' => $id
				));
				
			$info = $stmt->fetch(PDO::FETCH_ASSOC);
			return info;
		}
		
		public function login($email,$password){
			$sql = "SELECT email,password FROM users WHERE email=:email AND password=:password";
			$stmt = $this ->db_conn ->prepare($sql);
			
			$results = $stmt -> execute(array(
				':email' => $email,
				':password' => $password
			));
			
			
			if($results){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $details;
			}
			
		}
		
		public function register($data){
			extract($data);
			
			$sql = "INSERT INTO users (id,password,email,address,name) VALUES(?,?,?,?,?)";
			$stmt = $this ->db_conn -> prepare($sql);
			
			$results = $stmt -> execute(array($id_number,"$password","$email","$county","$firstName"));
			
			if($results){
				return $results;
				die();
			}
			
			
		}
		
			public function registeruser($email,$password,$name,$address,$mobile){
			
			$sql = "INSERT INTO users (name,password,email,mobile,address) VALUES(?,?,?,?,?)";
			$stmt = $this -> db_conn -> prepare($sql);
			
			$results = $stmt -> execute(array("$name","$password","$email","$mobile","$address"));
			// print_r($this->db_conn->errorInfo());
			// print_r(array("$name","$password","$email","$mobile","$address"));
			// die();
			if($results){
				return $results=$this->db_conn->errorInfo();
				
			}
			
		}
		public function register_person($data){
			extract($data);
			$sql = "INSERT INTO persons () VALUES(?,?,?,?,?)";
				$stmt = $this -> db_conn -> prepare($sql);
				$results = $stmt-> execute(array("$firstName","$lastName",$id_number,"$county","$gender"));
				
				if($results){
					return $results;
				}
				
		}
		
		public function getAlerts1(){
			$sql = "SELECT Model,Owner,Number_plate,image,description,phoneNumber FROM missing_vehicles";
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute();
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
				foreach($rows as $row){
					echo '<tr>';
					echo '<td class="carry-up">'.$row['Model'].'</td>';
					echo '<td class="carry-up">'.$row['Number_plate'].'</td>';
					echo '<td class="carry-up">'.$row['Owner'].'</td>';
					echo '<td ><img src="Uploads/missing_vehicles/'.$row['image'].'"/></td>';
					echo '<td class="carry-up">'.$row['description'].'</td>';
					echo '<td class="carry-up">0'.$row['phoneNumber'].'</td>';
					echo '</tr>';
					
			}
		 }
				
			}
			return;
		}

		public function getAlerts2(){
			$sql = "SELECT fullName,Address,image, date,description,phoneNumber,Status FROM missing_persons";
			
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute();
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
				$count=1;
				foreach($rows as $row){
					echo '<tr style="1px solid #000">';
					echo '<td style="padding:10px;border:1px solid #000;">'.$count++.'</td>';
					echo '<td style="padding:10px;border:1px solid #000;">'.$row['fullName'].'</td>';
					echo '<td style="padding:10px;border:1px solid #000;">'.$row['Address'].'</td>';
					echo '<td style="padding:10px;border:1px solid #000;"><img src="Uploads/missing_persons/'.$row['image'].'"/></td>';
						echo '<td style="padding:10px;border:1px solid #000;">'.$row['date'].'</td>';
					echo '<td style="padding:10px;border:1px solid #000;">'.$row['description'].'</td>';
					echo '<td style="padding:10px;border:1px solid #000;">0'.$row['phoneNumber'].'</td>';
					echo '</tr>';
					
			}
		 }
				
			}
			return;
		}

		public function getAlerts3(){
			$sql = "SELECT * FROM items";
			
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute();
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
				$count=1;
				foreach($rows as $row){
					echo '<tr style="1px solid #000">';
					echo '<td style="padding:10px;border:1px solid #000;">'.$count++.'</td>';
					echo '<td style="padding:10px;border:1px solid #000;">'.$row['Item_Name'].'</td>';
					echo '<td style="padding:10px;border:1px solid #000;">'.$row['Description'].'</td>';
					echo '<td style="padding:10px;border:1px solid #000;">'.$row['Last_Seen'].'</td>';
					echo '<td style="padding:10px;border:1px solid #000;">'.$row['status'].'</td>';
					echo '<td style="padding:10px;border:1px solid #000;">'.$row['category'].'</td>';
					echo '</tr>';
					
			}
		 }
				
			}
			return;
		}
		
	}

	$db_conn = new pdo_database();

?>