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
		public function getDetailreport(){
			$sql = "SELECT * FROM crimes";
			$stmt = $this->db_conn->prepare($sql);
			$results = $stmt -> execute();
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
					foreach($rows as $row){
						echo '<tr><td>'.$row['Crime_No'].'</td><td>'.$row['Category'].'</td><td>'.$row['date'].'</td><td>'.$row['Description'].'</td><td>'.$row['Crime_Scene'].'</td><td><form method="get" action="crime.php"><button name="show" value='.$row['Crime_No'].'>View</button></form></td></tr>';
					}
				}
					
			}
	}
		
		public function getDetailedInfo($id){
			$sql = "SELECT * FROM items WHERE Item_NO = :id_number";
			$stmt = $this->db_conn->prepare($sql);
			$stmt->execute(
				array(
				':id_number' => $id
				));
				
			
			$info = $stmt->fetch(PDO::FETCH_ASSOC);
			
			
			extract($info);
			
			echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Item No:</b></td><td>'.$info['Item_NO'].'</td></tr>';
			echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Item Name:</b></td><td>'.$Item_Name.'</td></tr>';
			echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>ID Description:</b></td><td>'.$Description.'</td></tr>';
			echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Category:</b></td><td>'.$category.'</td></tr>';
			echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Status:</b></td><td>'.$status.'</td></tr>';
			echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Crme record:</b></td><td>Good</td></tr>';
	}
		
		public function getStatictics(){
			$sql = "SELECT Category,COUNT(*) AS number FROM crimes GROUP BY Category";
			
			$stmt = $this->db_conn->prepare($sql);
			$stmt->execute(
				array(
				':id_number' => $id
				));
				
			$stat = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $stat;
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
			
			$password = sha1($password);
			$sql = "INSERT INTO users () VALUES(?,?,?)";
			$stmt = $this -> db_conn -> prepare($sql);
			
			$results = $stmt -> execute(array($id_number,"$password","$email"));
			
			if($results){
				return $results;
				die();
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
		
		public function getTotalCrimes(){
			$sql = "SELECT COUNT(*) AS number FROM crimes";
			
			$stmt = $this -> db_conn -> prepare($sql);
			
			$results = $stmt -> execute();
			
			if($results){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				echo $details[0]['number'];
				return;
			}
			
		}
		
		public function getTotalMissingPersons(){
			$sql = "SELECT COUNT(*) AS number FROM missing_persons WHERE status = 'Not Found'";
			
			$stmt = $this -> db_conn -> prepare($sql);
			
			$results = $stmt -> execute();
			
			if($results){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				echo $details[0]['number'];
				return;
			}
			
		}
		
		public function  getTotalMissingVehicles(){
			$sql = "SELECT COUNT(*) as number FROM missing_vehicles";
			
			$stmt = $this -> db_conn -> prepare($sql);
			
			$results = $stmt -> execute();
			
			if($results){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
				echo $details[0]['number'];
				return;
			}
		}
		
		public function  getTotalLostItems(){
			$sql = "SELECT COUNT(*) as number FROM items WHERE status = 'Not found'";
			
			$stmt = $this -> db_conn -> prepare($sql);
			
			$results = $stmt -> execute();
			
			if($results){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				echo $details[0]['number'];
				return;
			}
		}
		
		public function getApplications(){
			$sql = "SELECT * FROM items";
			
			$stmt = $this -> db_conn -> prepare($sql);
			
			$results = $stmt -> execute();
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				if(count($rows) > 0){
					echo '<tr style="border-bottom:2px solid #000;">';
					echo '<td><b>Category</b></td>';
					echo '<td text-align="center"><b>Action</b></td>';
					echo '</tr>';
					foreach($rows as $row){
						echo '<tr class="border-bottom:1px solid #6f716d;"><td>'.ucfirst($row['Description']).'</td><td><a href="application.php?id='.$row['Item_NO'].'">View</a></td></tr>'	;
					}
				}
				else{
					echo "No applications";
				} 	
			}
			
			
			return;
			
		}
		
		public function aplicationHandler($id){
			$sql = "Delete from items WHERE Item_NO = ?";
			
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($id));
			
			if($results){
					$rows_affected = $stmt ->rowCount();
					
					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}
			
		}
		
		public function getStollenVehicles(){
			$sql = "SELECT Number_plate FROM missing_vehicles";
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute();
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
					foreach($rows as $row){
						echo '<tr><td>Missing</td><td>'.$row['Number_plate'].'</td><td><a href="missing.php?id='.urlencode($row['Number_plate']).'">View</a></td></tr>';
					}
				}else
				{
					echo "No Data Found";
				}					
			}
			return;
			
		}
		
		public function getDetailedInfoVehicle($id){
			$sql = "SELECT Model,Owner,image,description,phoneNumber FROM missing_vehicles WHERE Number_plate = ?";
	
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute(array("$id"));
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Model:</b></td><td>'.$rows[0]['Model'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Number Plate:</b></td><td>'.$id.'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Image:</b></td><td><img src="../Uploads/missing_vehicles/'.$rows[0]['image'].'"/></td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Description:</b></td><td>'.$rows[0]['description'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Phone Number:</b></td><td>'.$rows[0]['phoneNumber'].'</td></tr>';
					
			}
				
			}
			return;
		}

		public function getDetailedInfoPerson($name){
			$sql = "SELECT * FROM missing_persons WHERE person_id = '$name'";
			
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute(array("$name"));
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b> No.:</b></td><td>'.$name.'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Full Names:</b></td><td>'.$rows[0]['fullName'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Address:</b></td><td>'.$rows[0]['Address'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Image:</b></td><td><img src="../Uploads/missing_persons/'.$rows[0]['Image'].'"/></td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Description:</b></td><td>'.$rows[0]['Description'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Last Seen:</b></td><td>'.$rows[0]['date'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Phone Number:</b></td><td>0'.$rows[0]['phoneNumber'].'</td></tr>';
					
			}
				
			}
			return;
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

		public function getDetailedInfoPersonFound($name){
			$sql = "SELECT Address,image,description,phoneNumber FROM missing_persons WHERE person_id = '$name'";
			
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute(array("$name"));
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Full Names:</b></td><td>'.$name.'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Address:</b></td><td>'.$rows[0]['Address'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Image:</b></td><td><img src="../Uploads/missing_vehicles/'.$rows[0]['image'].'"/></td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Description:</b></td><td>'.$rows[0]['description'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Phone Number:</b></td><td>0'.$rows[0]['phoneNumber'].'</td></tr>';
			}
				
			}
			return;
		}

			public function getDetailedInfoVehicleFound($id){
			$sql = "SELECT Model,location_seen,image,description,phoneNumber FROM missing_vehicles_found WHERE Number_plate = '$id'";
			
			
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute(array("$id"));
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Model:</b></td><td>'.$rows[0]['Model'].'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Number Plate:</b></td><td>'.$id.'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Location seen:</b></td><td>'.$rows[0]['location_seen'].'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Image:</b></td><td><img src="../Uploads/missing_vehicles/'.$rows[0]['image'].'"/></td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Description:</b></td><td>'.$rows[0]['description'].'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Phone Number:</b></td><td>'.$rows[0]['phoneNumber'].'</td></tr>';
					
			}
				
			}
			return;
		}

		public function updateAlert($number){
			$sql = "delete from missing_vehicles WHERE Number_plate = ?";
			
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($number));
			
			if($results){
					$rows_affected = $stmt ->rowCount();
					
					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}
			
		}
		

		public function updateAlertFound($number){
			$sql = "UPDATE missing_vehicles SET reviewed = 'post' WHERE Number_plate = ?";
			
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($number));
			
			if($results){
					$rows_affected = $stmt ->rowCount();
					
					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}
			
		}
		
		public function removeAlert($plate){
			$sql = "delete from missing_vehicles_found where Number_plate = ?";
			
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($plate));
			

					if($results > 0){
						return true;
					}
					else {
						return false;
					}
				
		}
		
		public function removeAlert2($person){
			$sql = "delete from missing_persons where person_id = ?";
			
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($person));
			
			if($results){		
			    $rows_affected = $stmt ->rowCount();
					
					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}
		}
		
		public function getMissingPersons(){
			$sql = "SELECT * FROM missing_persons";
			
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute();
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
					foreach($rows as $row){
						echo '<tr><td>Missing</td><td>'.$row['fullName'].'</td><td><a href="missingPerson.php?n='.urlencode($row['person_id']).'">View</a></td></tr>';
					}
				}
				else{
					echo "No Records to display";
				} 	
			}
			
		}
		
		public function getFoundPersons(){
			$sql = "SELECT * FROM missing_persons ";
			
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute();
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
					foreach($rows as $row){
						echo '<tr><td>Found</td><td>'.$row['fullName'].'</td><td><a href="missingPerson.php?n='.urlencode($row['person_id']).'&status=found">View</a></td></tr>';
					}
				}
					
			}
			
		}


			public function postupdate($id,$Suspects,$remarks){
			$sql = "UPDATE crimes SET Suspects='$Suspects',remarks='$remarks' WHERE Crime_No = '$id'";
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute();
			
			if($results){
					$rows_affected = $stmt ->rowCount();
					
					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}
		}
		
		public function postAlert($name){
			echo "$name";
			$sql = "delete from missing_persons WHERE person_id = '$name'";
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($name));
			
			if($results){
					$rows_affected = $stmt ->rowCount();
					
					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}
		}
		
		
	}

	$db_conn = new pdo_database();

?>