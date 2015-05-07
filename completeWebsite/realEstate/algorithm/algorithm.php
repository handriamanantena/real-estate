<?php
	session_start();
	if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')){ //need to be logged in to access algorithm
		header("Location: ../signIn.php"); 
	}
	
	$db = mysqli_connect("localhost", "root", "", "rental_7435282");
	$queryowner ="SELECT * FROM propertylistings";
	$querytenant ="SELECT * FROM tenantpreferences";
	$resultowner = mysqli_query($db, $queryowner); 
	$resulttenant = mysqli_query($db, $querytenant);
	$tenantPreferenceList = array(); //array of each prefference for 1 tenant
	$allTheTenantsPreferenceList =array(); //we are creating a multi dim array 2X2. tenantXpreferences
	$tenantId =0;
	while($rowtenant=mysqli_fetch_assoc($resulttenant)){ //loops through property table to store in array
 		mysqli_data_seek ($resultowner, 0);
		while($rowowner=mysqli_fetch_assoc($resultowner)){//loops through owners and tenant tables
			$tenantCity = $rowtenant["city"]; //stores variables in each table
			$ownerCity = $rowowner["city"];
			$tenantprovince=$rowtenant["province"];
			$ownerprovince=$rowowner["province"];
			$factortenant = $rowtenant["paymentMethod"];
			$factorOwner = $rowowner["paymentMethod"];
			$tenantId = $rowtenant["tenantId"];
			$ownerID = $rowowner["ownerId"];
			if($factortenant=="Per Week")
				$factortenant=52;
			else if($factortenant=="Per Month")
				$factortenant==12;
			else if($factortenant=="Per Biyear")
				$factortenant=2;
			else if($factortenant=="Per Year")
				$factortenant=1;

			if($factorOwner=="Per Week")
				$factorOwner=52;
			else if($factorOwner=="Per Month")
				$factorOwner=12;
			else if($factorOwner=="Per Biyear")
				$factorOwner=2;
			else if($factorOwner=="Per Year")
				$factorOwner=1;
			$tenantPrice = $rowtenant["price"];
			$ownerPrice = $rowowner["price"];
			$tenantPrice *= $factortenant;
			$ownerPrice *= $factorOwner;
			$sameCity="False"; //value to determine if owner and tenant have same city
			$sameProvince="False";
			$priceCompare= 	abs($tenantPrice-$ownerPrice);
			if($tenantCity==$ownerCity)
				$sameCity="True";
			if($ownerprovince==$tenantprovince)
				$sameProvince="True";
			$compareOwnerArray = array($sameCity,$sameProvince,$priceCompare);//the array of all the comparison values of current owner. 
			$tenantPreferenceList[$ownerID]=$compareOwnerArray;
		}
		 $allTheTenantsPreferenceList[$tenantId]=$tenantPreferenceList; //the array which contains all the te
	}

	$sameCityArray= array();
	$priceDifferencesArray = array();
	$lowestPriceOwner=0;
	$orderForOneTenant=array();
	$orderForAllTenants=array();
	$numberOfTenantsorOwners = sizeof($allTheTenantsPreferenceList);
	foreach ($allTheTenantsPreferenceList as $tenantkey => $tenant)
	{
		foreach ($tenant as $ownerkey => $owner){
			if($owner[0]=="True"){
				if($owner[1]==True){
					$sameCityArray[$ownerkey]=$owner;				
				}
			}
	}
		$tenantCopy=$tenant;
		if(!empty($sameCityArray)){
			foreach($sameCityArray as $possibleOwnerKey => $possibleOwner){
				unset($tenantCopy[$possibleOwnerKey]); 
				$priceDifferencesArray[$possibleOwnerKey]=$possibleOwner[2];
			}
			asort($priceDifferencesArray);
			$orderedSameCityOwners=array();
			$count=0;
			foreach($priceDifferencesArray as $keyValue => $valuetoBeKeyed){
				$orderedSameCityOwners[$count]=$keyValue;
				$count++;
			}
			$leftOverOwnerArray=array();
			foreach ($tenantCopy as $leftOverOwnersKey => $leftOverOwners) {
				$leftOverOwnerArray[$count]= $leftOverOwnersKey; 
			 	$count++;
			 }  
			$orderForOneTenant=$orderedSameCityOwners+$leftOverOwnerArray;
			$orderForAllTenants[$tenantkey]=$orderForOneTenant;
			
		}
		else {	//none of the owners have same city so order does not matter.
			$count1=0; 
			$allTheOwnersArray = array();
			foreach ($tenantCopy as $currentOwnerkey => $allTheOwners) {
				$allTheOwnersArray[$count1]= $currentOwnerkey; 
			 	$count1++;
			 } 
			$orderForAllTenants[$tenantkey]=$allTheOwnersArray;
		}
		
	}

/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
*/	///creating owner's preference list
	//same as above code except for tenants
	$ownerPreferenceList = array();
	$allTheOwnerPreferenceList =array();
	$tenantId =0;
	 	mysqli_data_seek ($resultowner, 0);
		while($rowowner=mysqli_fetch_assoc($resultowner)){
 			mysqli_data_seek ($resulttenant, 0);
			while($rowtenant=mysqli_fetch_assoc($resulttenant)){
				$tenantCity = $rowtenant["city"];
				$ownerCity = $rowowner["city"];
				$tenantprovince=$rowtenant["province"];
				$ownerprovince=$rowowner["province"];
				$factortenant = $rowtenant["paymentMethod"];
				$factorOwner = $rowowner["paymentMethod"];
				$tenantId = $rowtenant["tenantId"];
				$ownerID = $rowowner["ownerId"];
				if($factortenant=="Per Week")
					$factortenant=52;
				else if($factortenant=="Per Month")
					$factortenant==12;
				else if($factortenant=="Per Biyear")
					$factortenant=2;
				else if($factortenant=="Per Year")
					$factortenant=1;

				if($factorOwner=="Per Week")
					$factorOwner=52;
				else if($factorOwner=="Per Month")
					$factorOwner=12;
				else if($factorOwner=="Per Biyear")
					$factorOwner=2;
				else if($factorOwner=="Per Year")
					$factorOwner=1;
				$tenantPrice = $rowtenant["price"];
				/*echo $tenantPrice . " ";*/
				$ownerPrice = $rowowner["price"];
				$tenantPrice *= $factortenant;
				$ownerPrice *= $factorOwner;
				$sameCity="False"; //value to determine if owner and tenant have same city
				$sameProvince="False";
				$priceCompare= 	abs($tenantPrice-$ownerPrice);
				if($tenantCity==$ownerCity)
					$sameCity="True";
				if($ownerprovince==$tenantprovince)
					$sameProvince="True";
				$compareOwnerArray = array($sameCity,$sameProvince,$priceCompare);//the array of all the comparison values of current owner. 
				$ownerPreferenceList[$tenantId]=$compareOwnerArray;
			}
		 $allTheOwnerPreferenceList[$ownerID]=$ownerPreferenceList;
	}

	$sameCityArrayOwner= array(); //array of cities for each tenant
	$priceDifferencesArrayOwner = array(); //the price comparison between tenants and owners
	$orderForOneOwner=array(); //ranking for one owner
	$orderForAllOwners=array();  //ranking for all owners. 2X2 array
	foreach ($allTheOwnerPreferenceList as $ownerkey => $owner) //loops through preference list
	{
		foreach ($owner as  $tenantkey => $tenant){
			if($tenant[0]=="True"){
				if($tenant[1]=="True"){
					$sameCityArrayOwner[$tenantkey]=$tenant;				
				}
			}
	}
		$ownerCopy=$owner; //copy of owner array so that changes wont change owner
		if(!empty($sameCityArrayOwner)){
			foreach($sameCityArrayOwner as $possibleTenantKey => $possibleTenant){
				unset($ownerCopy[$possibleTenantKey]); 
				$priceDifferencesArrayOwner[$possibleTenantKey]=$possibleTenant[2];
			}
			asort($priceDifferencesArrayOwner); //ranks based on prices
			$orderedSameCityTenant=array();
			$count=0;
			foreach($priceDifferencesArrayOwner as $keyValue => $valuetoBeKeyed){
				$orderedSameCityTenant[$count]=$keyValue;
				$count++;
			}
			$leftOverTenantArray=array(); //owners who can't find a tenant who wants to be in the same city
			foreach ($ownerCopy as $leftOverTenantKey => $leftOverTenants) { 
				$leftOverTenantArray[$count]= $leftOverTenantKey; 
			 	$count++;
			 }  
			$orderForOneOwner=$orderedSameCityTenant+$leftOverTenantArray; 
			$orderForAllOwners[$ownerkey]=$orderForOneOwner;
		}
		else {	//none of the owners have same city so order does not matter.
			$count1=0; 
			$allTheTenantsArray = array(); 
			foreach ($ownerCopy as $currentTenantkey => $allTheTenants) { //loops through ownercopy to get tenants
				$allTheTenantsArray[$count1]= $currentTenantkey; 
			 	$count1++; 
			 } 
			$orderForAllOwners[$ownerkey]=$allTheTenantsArray; //sets order of tenants for this array
		} 	
	} 
	
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
*/	///creating matching algorithm

	$currentPropositions=array();	//current ranking
	$proposedList=array(); //proposed ranking
	$proposedList=tenantPropose($orderForAllTenants); //tenants propose to owners

	while(!samePropositions($currentPropositions,$proposedList)){ //loops until tenants propose to the same owner
		reset($proposedList);
		$copyOfproposedList = new ArrayObject($proposedList);
		$copyOfCurrent = new ArrayObject($currentPropositions);
		foreach($proposedList as $proposedTenantId => $proposedOwner){
			$proposedTenantRanking = array_search($proposedTenantId, $orderForAllOwners[$proposedOwner]);
			$tenantToBeRanked = array_search($proposedOwner,$currentPropositions);
			if($tenantToBeRanked!==false){
				$rankingCurrentTenant = array_search($tenantToBeRanked,$orderForAllOwners[$proposedOwner]);
				if($rankingCurrentTenant==$proposedTenantRanking){
					continue;
				}
				else if($rankingCurrentTenant>$proposedTenantRanking){ //the new has a better ranking
					unset($orderForAllTenants[$tenantToBeRanked][0]);//	removes owner, that had been ranked in currentPropositions
					$orderForAllTenants[$tenantToBeRanked] = array_values($orderForAllTenants[$tenantToBeRanked]);
					if(!empty($currentPropositions[$proposedTenantId]))
						$copyOfproposedList[$tenantToBeRanked] = $copyOfCurrent[$tenantToBeRanked]; //sets old positions from $currentPropositions
					if(!empty($orderForAllTenants[$tenantToBeRanked][0]))
						$currentPropositions[$tenantToBeRanked] = $orderForAllTenants[$tenantToBeRanked][0]; //resets tenant which just had a value crossed off

					$currentPropositions[$proposedTenantId]=$proposedOwner;
				}
				else{
					unset($orderForAllTenants[$proposedTenantId][0]);//	removes owner, that had been ranked in currentPropositions
					$orderForAllTenants[$proposedTenantId] = array_values($orderForAllTenants[$proposedTenantId]);
					if(!empty($currentPropositions[$proposedTenantId]))
						$copyOfproposedList[$proposedTenantId] = $copyOfCurrent[$proposedTenantId]; //sets old positions from $currentPropositions
					if(!empty($orderForAllTenants[$proposedTenantId][0]))
						$currentPropositions[$proposedTenantId] = $orderForAllTenants[$proposedTenantId][0]; //resets tenant which just had a value crossed off
					$currentPropositions[$tenantToBeRanked]=$proposedOwner;
				}
			}
			else{
				$currentPropositions[$proposedTenantId]=$proposedOwner; //adds proposed owner to the array which contains ranking of 1 tenant
			}
		}	
		$proposedList = new ArrayObject($copyOfproposedList); //copys changes made to poposedlist
	}



	function samePropositions($curraentArray,$previousArray){ //checks if popositions are equal
		if(empty($curraentArray)||empty($previousArray)){
			return false; //just entered loop so we must retun false
		}
		else {//not emty array, we must check if arrays are the same
			foreach ($curraentArray as $key => $value) {
				if($curraentArray[$key]!=$previousArray[$key]){
					return false;
				}
			}
			return true;
		}
	}
	function tenantPropose($arrayOfTenants){ //tenants propose to owners
		$arrayOfPropositions=array();
		foreach ($arrayOfTenants as $tenantPermanantId => $tenant) {
			$arrayOfPropositions[$tenantPermanantId] = $tenant[0]; //tenants propose to their prefered owner
		}
		return $arrayOfPropositions;
	}


/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
/**********************************************************************************************
*/
 //finding match
	$id=$_SESSION['id']; //id of current owner or tenant depending on the user
	$clientType=$_SESSION['clientType']; //checks if the user is owner or tenant
	$match = "";
	if($clientType=="owner"){ 
		$match = array_search($id, $currentPropositions);
	}
	else{
		$match=$currentPropositions[$id];
	}
	$_SESSION['matchId']=$match; //finds match
	echo $match;
	if($clientType=="owner")
		header("Location: ../matchViewProfile.php"); //goes to owner page
	else
		header("Location: ../matchviewProperties.php");//goes to tenant page
?>