 <?php
	 $url="localhost/demo/api.php?action=fetch_all";
	 $client=curl_init($url);
	 curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	 $response=curl_exec($client);
	 $result=json_decode($response);
	 $output='';
	 if(count($result)>0)
	 {
		 foreach($result as $row)
		 {
			 $output .='
			<tr>
			<td>'.$row->name.'</td>
			 <td>'.$row->email.'</td>
			<td>'.$row->address.'</td>
			 <td>'.$row->phone.'</td>
			 <td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Edit</button></td>
			 <td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete</button></td>
			</tr>';
		}
	 }
	 else
	 {
		 $output .='
		 <tr>
		  <td colspan="6" align="center">NO Data Found </td>
		  </tr>';
	 }
	 echo $output;
	 ?>