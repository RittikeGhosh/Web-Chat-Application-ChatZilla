# webchatapplication


********************************************************************************************************
**********Please note that currently this webpage is perfect for the pc. as it does not have responsive pages*********
************it works and appear perfect for the pc************************************************
********************************************************************************************************

ChatZilla provide the platform to chat with the friends and beloved ones.

1 > Before running the webpage make a database named 'chatzilla' .

2 > In this database make a table named 'userdata' having structure as :-

	s.no 	name 		datatype				      NULL 	default
 	
 	 1	id		int(11)						No	None	
	 2	emailIndex	varchar(100)	latin1_swedish_ci		No	None
	 3	password	varchar(50)	latin1_swedish_ci		No	None		
	 4	name		varchar(50)	latin1_swedish_ci		No	None		
	 5	gender		varchar(7)	latin1_swedish_ci		No	None		
	 6	dob		date						No	None		
	 7	status		tinyint(1)					No	0			
	 8	number		int(10)						No	None			
	 9	logdate		datetime					No	CURRENT_TIMESTAMP		
	10	address		varchar(200)	latin1_swedish_ci		Yes	NULL		
	11	profileimg	varchar(50)	latin1_swedish_ci		No	None		
	
make sure to run the file named index.php inside includes at an interval of about 20min to keep the user log status updated .
Or you can perform the cron job for that.






