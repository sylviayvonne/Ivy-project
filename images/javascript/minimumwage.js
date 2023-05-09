var skills = document.getElementById('workerSkills');
    		var	wages = document.getElementById('totalCost');
    		var	description = document.getElementById('jobDescription');
    		
			description.onchange = function () { 
				
				/*wages.value= 10;
				alert(wages.value);*/

				 if (skills.value == "Carpenter") {
			    	var price = "650";
			        alert("Your total cost for the service will be ksh. 650 for the day");
			        wages.value = price;
			        //alert(wages.value);
			    }

			    else if (skills.value == "Cleaner") {
			    	var price = "700";
			        alert("Your total cost for the service will be ksh. 700 for the day");
			        wages.value = price;
			    }

			    else if (skills.value == "Electrician") {
			    	var price ="860";
			        alert("Your total cost for the service will be ksh. 860 for the day");
			        wages.value = price;
			    }

			    else if (skills.value == "Plumber") {
			    	var price = "745";
			        alert("Your total cost for the service will be ksh. 745 for the day");
			        wages.value = price;
			    }
			   else if (skills.value == "Mechanic") {
			    	var price = "1500";
			        alert("Your total cost for the service will be ksh. 1500 for the day");
			        wages.value = price;
			    }

			   else if (skills.value == "Painter") {
			    	var price = "950";
			        alert("Your total cost for the service will be ksh. 950 for the day");
			        wages.value = price;
			    }

			    else if (skills.value == "Welder") {
			    	var price = "800";
			        alert("Your total cost for the service will be ksh. 800 for the day");
			        wages.value = price;
			    }

			    else if (skills.value == "Gardener/Landscape artist") {
			    	var price = "700";
			        alert("Your total cost for the service will be ksh. 700 for the day");
			        wages.value = price;
			    }

			   else if (skills.value == "Car driver") {
			   		var price = "900"
			        alert("Your total cost for the service will be ksh. 900 for the day ");
			        wages.value = price;
			    }
        	};