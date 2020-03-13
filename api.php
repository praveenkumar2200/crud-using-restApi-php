<?php

include("config.php");

// fetching all uers data
if(isset($_GET["action"]) && $_GET["action"]=="fetch_all")
{
	$sql="select * from users";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_array($result))
		{
		$response[]=$row;
		}
		$json=json_encode($response);
		echo $json;
	}
}

//  insert new user record
if(isset($_GET["action"]) && $_GET["action"]=="insert")
{
	if(isset($_POST["name"]))
	{
				$name=$_POST["name"];
				$email=$_POST["email"];
				$address=$_POST["address"];
				$phone=$_POST["phone"];
		
		$query="insert into users(name,email,address,phone) values('$name','$email','$address','$phone')";
		$result = mysqli_query($con,$query);
		if($result>0)
		{
			$data[]=array('success'=>'1');
		}
		else
		{
			$data[]=array('success'=>'0');
		}
	}
	else
	{
		$data[]=array('success'=>'0');
	}
	$json_data=json_encode($data);
	echo $json_data;
}


//   fetch single user decord
if(isset($_GET["action"]) && $_GET["action"]=="fetch_single")
{
	if($_GET["id"]!="")
	{
	    $id=$_GET["id"];
		$sql="select * from users where id='$id'";
		$result_single=mysqli_query($con,$sql);
		if(mysqli_num_rows($result_single)>0)
		{
			while($row=mysqli_fetch_array($result_single))
			{
			$data['name']=$row['name'];
			$data['email']=$row['email'];
			$data['address']=$row['address'];
			$data['phone']=$row['phone'];
			}
			echo json_encode($data);
		}
	}
}


//update user records
if(isset($_GET["action"]) && $_GET["action"]=="update")
{
	if(isset($_POST["name"]))
	{
		$id=$_POST["id"];
		$name=$_POST["name"];
		$email=$_POST["email"];
		$address=$_POST["address"];
		$phone=$_POST["phone"];
		
		$query="update users set name='$name',email='$email',address='$address',phone='$phone' where id='$id'";
		$result = mysqli_query($con,$query);
		if($result>0)
		{
			$data[]=array('success'=>'1');
		}
		else
		{
			$data[]=array('success'=>'0');
		}
	}
	else
	{
		$data[]=array('success'=>'0');
	}
	$json_data=json_encode($data);
	echo $json_data;
}



//  delete user details
if(isset($_GET["action"]) && $_GET["action"]=="delete")
{
	if($_GET["id"]!="")
	{
	    $id=$_GET["id"];
		$sql="delete from users where id='$id'";
		$result_deiete=mysqli_query($con,$sql);
		if($result_deiete>0)
		{
			$data[]=array('success'=>'1');
		}
		else
		{
			$data[]=array('success'=>'0');
		}
		
	}
	else
	{
		$data[]=array('success'=>'0');
	}
	$json_data=json_encode($data);
	echo $json_data;
}
?>