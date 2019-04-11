<?php

//create class for user status

class Status
{
	//getting a specific status post
	public function getStatusById($id, $db){
		
		$query = "SELECT * FROM status WHERE id = :id";
		$statement = $db->prepare($query);
		
		//bindParam = Binds a parameter to the specified variable name
		$statement->bindParam(':id', $id);
		$statement->execute();
		
		$status = $statement->fetch(PDO::FETCH_OBJ);
		
		return $status;
		
	}
	
	//getting all the status created and save on the database
	public function getAllStatus($db){
		
		$query = "SELECT * FROM status ORDER BY date_post Desc LIMIT 4";
		$statement = $db->prepare($query);
		$statement->execute();
		
		$status = $statement->fetchAll(PDO::FETCH_OBJ);
		
		return $status;
	}
	
	//adding status
	public function addStatus($content, $date_post, $user_id, $db){
			
		$query = "INSERT INTO status(content, date_post, user_id)
				  VALUES (:content, :date_post , :user_id)";
		$statement = $db->prepare($query);
		$statement->bindParam(':content', $content);
		$statement->bindParam(':date_post', $date_post);
		$statement->bindParam(':user_id', $user_id);
		
		$status = $statement->execute();
		
		return $status;
	}
	
	//updating status
	public function updateStatus($id, $content, $date_post, $user_id, $db){
		
		$query = "UPDATE status
				  SET content = :content,
				  	  date_post = :date_post,
					  user_id = :user_id
				  WHERE id = :id";
		
		$statement = $db->prepare($query);
		$statement->bindParam(':id', $id);
		$statement->bindParam(':content', $content);
		$statement->bindParam(':date_post' , $date_post);
		$statement->bindParam(':user_id' , $user_id);
		
		$status = $statement->execute();
		
		return $status;
		
	}
	
	//deleting a status
	public function deleteStatus($id, $db){
		
		$query = "DELETE FROM status WHERE id = :id";
		$statement = $db->prepare($query);
		$statement->bindParam(':id', $id);
		
		$status = $statement->execute();
		
		return $status;
		
	}
}