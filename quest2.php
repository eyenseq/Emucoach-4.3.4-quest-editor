<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Start session to retrieve DB credentials
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['ip']) && isset($_GET['port']) && isset($_GET['user']) && isset($_GET['password']) && isset($_GET['dbname'])) {
    $id = $_GET['id'];
    $ip = $_GET['ip'];
    $port = $_GET['port'];
    $user = $_GET['user'];
    $password = $_GET['password'];
    $dbname = $_GET['dbname'];

    $conn = new mysqli($ip, $user, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM quest_template WHERE Id = $id";
    $result = $conn->query($sql);

	
		
    if ($result->num_rows > 0) {
        $quest = $result->fetch_assoc();
    } else {
        die("No quest found with ID: $id");
    }

    $conn->close();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $ip = $_POST['ip'];
    $port = $_POST['port'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $dbname = $_POST['dbname'];
    $title = $_POST['title'];
    $method = $_POST['method'];
    $level = $_POST['level'];
    $minLevel = $_POST['minLevel'];
    $zoneOrSort = $_POST['zoneOrSort'];
    $type = $_POST['type'];
    $suggestedPlayers = $_POST['suggestedPlayers'];
    $sourceItemId = $_POST['sourceItemId'];
    $flags = $_POST['flags'];
	$specialflags =  $_POST['specialflags'];
    $limitTime = $_POST['limitTime'];
    $requiredRaces = $_POST['requiredRaces'];
    $requiredPlayerKills = $_POST['requiredPlayerKills'];
    $requiredClasses = $_POST['requiredClasses'];
	$PointMapId = $_POST['PointMapId'];
    $PointX = $_POST['PointX'];
    $PointY = $_POST['PointY'];
    $PointOption = $_POST['PointOption'];
	$CompletedText = $_POST['CompletedText'];
	$Details = $_POST['Details'];
	$EndText = $_POST['EndText'];
	$Objectives = $_POST['Objectives'];
	$ObjectiveText1 = $_POST['ObjectiveText1'];
	$ObjectiveText2 = $_POST['ObjectiveText2'];
	$ObjectiveText3 = $_POST['ObjectiveText3'];
	$ObjectiveText4 = $_POST['ObjectiveText4'];
	$RequiredItemId1 = $_POST['RequiredItemId1'];
	$RequiredItemId2 = $_POST['RequiredItemId2'];
	$RequiredItemId3 = $_POST['RequiredItemId3'];
	$RequiredItemId4 = $_POST['RequiredItemId4'];
	$RequiredItemId5 = $_POST['RequiredItemId5'];
	$RequiredItemId6 = $_POST['RequiredItemId6'];
	$RequiredItemCount1 = $_POST['RequiredItemCount1'];
	$RequiredItemCount2 = $_POST['RequiredItemCount2'];
	$RequiredItemCount3 = $_POST['RequiredItemCount3'];
	$RequiredItemCount4 = $_POST['RequiredItemCount4'];
	$RequiredItemCount5 = $_POST['RequiredItemCount5'];
	$RequiredItemCount6 = $_POST['RequiredItemCount6'];
	$RequiredNpcOrGo1 = $_POST['RequiredNpcOrGo1'];
	$RequiredNpcOrGo2 = $_POST['RequiredNpcOrGo2'];
	$RequiredNpcOrGo3 = $_POST['RequiredNpcOrGo3'];
	$RequiredNpcOrGo4 = $_POST['RequiredNpcOrGo4'];
	$RequiredNpcOrGoCount1 = $_POST['RequiredNpcOrGoCount1'];
	$RequiredNpcOrGoCount2 = $_POST['RequiredNpcOrGoCount2'];
	$RequiredNpcOrGoCount3 = $_POST['RequiredNpcOrGoCount3'];
	$RequiredNpcOrGoCount4 = $_POST['RequiredNpcOrGoCount4'];
	$RequiredFactionId1 = $_POST['RequiredFactionId1'];
	$RequiredFactionId2 = $_POST['RequiredFactionId2'];
	$RequiredFactionValue1 = $_POST['RequiredFactionValue1'];
	$RequiredFactionValue2 = $_POST['RequiredFactionValue2'];
	$RequiredSourceItemId1 = $_POST['RequiredSourceItemId1'];
	$RequiredSourceItemId2 = $_POST['RequiredSourceItemId2'];
	$RequiredSourceItemId3 = $_POST['RequiredSourceItemId3'];
	$RequiredSourceItemId4 = $_POST['RequiredSourceItemId4'];
	$RequiredSourceItemCount1 = $_POST['RequiredSourceItemCount1'];
	$RequiredSourceItemCount2 = $_POST['RequiredSourceItemCount2'];
	$RequiredSourceItemCount3 = $_POST['RequiredSourceItemCount3'];
	$RequiredSourceItemCount4 = $_POST['RequiredSourceItemCount4'];
	$RewardTitleId = $_POST['RewardTitleId'];
	$RewardTalents = $_POST['RewardTalents'];
	$RewardArenaPoints = $_POST['RewardArenaPoints'];
	$RewardXPId = $_POST['RewardXPId'];
	$RewardOrRequiredMoney = $_POST['RewardOrRequiredMoney'];
	$RewardSpell = $_POST['RewardSpell'];
	$RewardSpellCast = $_POST['RewardSpellCast'];
	$RewardHonor = $_POST['RewardHonor'];
	$RewardHonorMultiplier = $_POST['RewardHonorMultiplier'];
	$RewardItemId1 = $_POST['RewardItemId1'];
	$RewardItemId2 = $_POST['RewardItemId2'];
	$RewardItemId3 = $_POST['RewardItemId3'];
	$RewardItemId4 = $_POST['RewardItemId4'];
	$RewardItemCount1 = $_POST['RewardItemCount1'];
	$RewardItemCount2 = $_POST['RewardItemCount2'];
	$RewardItemCount3 = $_POST['RewardItemCount3'];
	$RewardItemCount4 = $_POST['RewardItemCount4'];
	$RewardChoiceItemId1 = $_POST['RewardChoiceItemId1'];
	$RewardChoiceItemId2 = $_POST['RewardChoiceItemId2'];
	$RewardChoiceItemId3 = $_POST['RewardChoiceItemId3'];
	$RewardChoiceItemId4 = $_POST['RewardChoiceItemId4'];
	$RewardChoiceItemId5 = $_POST['RewardChoiceItemId5'];
	$RewardChoiceItemId6 = $_POST['RewardChoiceItemId6'];
	$RewardChoiceItemCount1 = $_POST['RewardChoiceItemCount1'];
	$RewardChoiceItemCount2 = $_POST['RewardChoiceItemCount2'];
	$RewardChoiceItemCount3 = $_POST['RewardChoiceItemCount3'];
	$RewardChoiceItemCount4 = $_POST['RewardChoiceItemCount4'];
	$RewardChoiceItemCount5 = $_POST['RewardChoiceItemCount5'];
	$RewardChoiceItemCount6 = $_POST['RewardChoiceItemCount6'];
	$RewardFactionId1 = $_POST['RewardFactionId1'];
	$RewardFactionId2 = $_POST['RewardFactionId2'];
	$RewardFactionId3 = $_POST['RewardFactionId3'];
	$RewardFactionId4 = $_POST['RewardFactionId4'];
	$RewardFactionId5 = $_POST['RewardFactionId5'];
	$RewardFactionValueId1 = $_POST['RewardFactionValueId1'];
	$RewardFactionValueId2 = $_POST['RewardFactionValueId2'];
	$RewardFactionValueId3 = $_POST['RewardFactionValueId3'];
	$RewardFactionValueId4 = $_POST['RewardFactionValueId4'];
	$RewardFactionValueId5 = $_POST['RewardFactionValueId5'];
	$RewardFactionValueIdOverride1 = $_POST['RewardFactionValueIdOverride1'];
	$RewardFactionValueIdOverride2 = $_POST['RewardFactionValueIdOverride2'];
	$RewardFactionValueIdOverride3 = $_POST['RewardFactionValueIdOverride3'];
	$RewardFactionValueIdOverride4 = $_POST['RewardFactionValueIdOverride4'];
	$RewardFactionValueIdOverride5 = $_POST['RewardFactionValueIdOverride5'];
	$PrevQuestId = $_POST['PrevQuestId'];
	$NextQuestId = $_POST['NextQuestId'];
	$MaxLevel = $_POST['MaxLevel'];
	$SourceSpellId = $_POST['SourceSpellId'];
	$ExclusiveGroup = $_POST['ExclusiveGroup'];
	$RequiredSkillId = $_POST['RequiredSkillId'];
	$RequiredSkillPoints = $_POST['RequiredSkillPoints'];
	$RequiredMinRepFaction = $_POST['RequiredMinRepFaction'];
	$RequiredMinRepValue = $_POST['RequiredMinRepValue'];
	$RequiredMaxRepFaction = $_POST['RequiredMaxRepFaction'];
	$RequiredMaxRepValue = $_POST['RequiredMaxRepValue'];
	$RewardMailTemplateId = $_POST['RewardMailTemplateId'];
	$RewardMailDelay = $_POST['RewardMailDelay'];
	$OfferRewardText = $_POST['OfferRewardText'];
	$OfferRewardEmote1 = $_POST['OfferRewardEmote1'];
	$OfferRewardEmote2 = $_POST['OfferRewardEmote2'];
	$OfferRewardEmote3 = $_POST['OfferRewardEmote3'];
	$OfferRewardEmote4 = $_POST['OfferRewardEmote4'];
	$OfferRewardEmoteDelay1 = $_POST['OfferRewardEmoteDelay1'];
	$OfferRewardEmoteDelay2 = $_POST['OfferRewardEmoteDelay2'];
	$OfferRewardEmoteDelay3 = $_POST['OfferRewardEmoteDelay3'];
	$OfferRewardEmoteDelay4 = $_POST['OfferRewardEmoteDelay4'];
	$RequestItemsText = $_POST['RequestItemsText'];
	$EmoteOnComplete = $_POST['EmoteOnComplete'];
	$EmoteOnIncomplete = $_POST['EmoteOnIncomplete'];
	$CompletedText = $_POST['CompletedText'];
	$SourceItemCount = $_POST['SourceItemCount'];

	
	
	
	
    $conn = new mysqli($ip, $user, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



    $sql = "UPDATE quest_template SET 
                Title='$title', 
                Method='$method', 
                Level='$level', 
                MinLevel='$minLevel', 
                ZoneOrSort='$zoneOrSort', 
                Type='$type', 
                SuggestedPlayers='$suggestedPlayers', 
                SourceItemId='$sourceItemId', 
                Flags='$flags', 
				SpecialFlags='$specialflags',
                LimitTime='$limitTime', 
                RequiredRaces='$requiredRaces', 
                RequiredPlayerKills='$requiredPlayerKills', 
                RequiredClasses='$requiredClasses',
				PointMapId='$PointMapId', 
                PointX='$PointX', 
                PointY='$PointY', 
                PointOption='$PointOption',
				
				CompletedText='$CompletedText',
				Details='$Details',
				EndText='$EndText',
				Objectives='$Objectives',
				ObjectiveText1='$ObjectiveText1',
				ObjectiveText2='$ObjectiveText2',
				ObjectiveText3='$ObjectiveText3',
				ObjectiveText4='$ObjectiveText4',
				RequiredItemId1='$RequiredItemId1',
				RequiredItemId2='$RequiredItemId2',
				RequiredItemId3='$RequiredItemId3',
				RequiredItemId4='$RequiredItemId4',
				RequiredItemId5='$RequiredItemId5',
				RequiredItemId6='$RequiredItemId6',
				RequiredItemCount1='$RequiredItemCount1',
				RequiredItemCount2='$RequiredItemCount2',
				RequiredItemCount3='$RequiredItemCount3',
				RequiredItemCount4='$RequiredItemCount4',
				RequiredItemCount5='$RequiredItemCount5',
				RequiredItemCount6='$RequiredItemCount6',
				RequiredNpcOrGo1='$RequiredNpcOrGo1',
				RequiredNpcOrGo2='$RequiredNpcOrGo2',
				RequiredNpcOrGo3='$RequiredNpcOrGo3',
				RequiredNpcOrGo4='$RequiredNpcOrGo4',
				RequiredNpcOrGoCount1='$RequiredNpcOrGoCount1',
				RequiredNpcOrGoCount2='$RequiredNpcOrGoCount2',
				RequiredNpcOrGoCount3='$RequiredNpcOrGoCount3',
				RequiredNpcOrGoCount4='$RequiredNpcOrGoCount4',
				RequiredFactionId1='$RequiredFactionId1',
				RequiredFactionId2='$RequiredFactionId2',
				RequiredFactionValue1='$RequiredFactionValue1',
				RequiredFactionValue2='$RequiredFactionValue2',
				RequiredSourceItemId1='$RequiredSourceItemId1',
				RequiredSourceItemId2='$RequiredSourceItemId2',
				RequiredSourceItemId3='$RequiredSourceItemId3',
				RequiredSourceItemId4='$RequiredSourceItemId4',
				RequiredSourceItemCount1='$RequiredSourceItemCount1',
				RequiredSourceItemCount2='$RequiredSourceItemCount2',
				RequiredSourceItemCount3='$RequiredSourceItemCount3',
				RequiredSourceItemCount4='$RequiredSourceItemCount4',
				RewardTitleId='$RewardTitleId',
				RewardTalents='$RewardTalents',
				RewardArenaPoints='$RewardArenaPoints',
				RewardXPId='$RewardXPId',
				RewardOrRequiredMoney='$RewardOrRequiredMoney',
				RewardSpell='$RewardSpell',
				RewardSpellCast='$RewardSpellCast',
				RewardHonor='$RewardHonor',
				RewardHonorMultiplier='$RewardHonorMultiplier',
				RewardItemCount1='$RewardItemCount1',
				RewardItemCount2='$RewardItemCount2',
				RewardItemCount3='$RewardItemCount3',
				RewardItemCount4='$RewardItemCount4',
				RewardItemId1='$RewardItemId1',
				RewardItemId2='$RewardItemId2',
				RewardItemId3='$RewardItemId3',
				RewardItemId4='$RewardItemId4',
				RewardChoiceItemId1='$RewardChoiceItemId1',
				RewardChoiceItemId2='$RewardChoiceItemId2',
				RewardChoiceItemId3='$RewardChoiceItemId3',
				RewardChoiceItemId4='$RewardChoiceItemId4',
				RewardChoiceItemId5='$RewardChoiceItemId5',
				RewardChoiceItemId6='$RewardChoiceItemId6',
				RewardChoiceItemCount1='$RewardChoiceItemCount1',
				RewardChoiceItemCount2='$RewardChoiceItemCount2',
				RewardChoiceItemCount3='$RewardChoiceItemCount3',
				RewardChoiceItemCount4='$RewardChoiceItemCount4',
				RewardChoiceItemCount5='$RewardChoiceItemCount5',
				RewardChoiceItemCount6='$RewardChoiceItemCount6',
				RewardFactionId1='$RewardFactionId1',
				RewardFactionId2='$RewardFactionId2',
				RewardFactionId3='$RewardFactionId3',
				RewardFactionId4='$RewardFactionId4',
				RewardFactionId5='$RewardFactionId5',
				RewardFactionValueId1='$RewardFactionValueId1',
				RewardFactionValueId2='$RewardFactionValueId2',
				RewardFactionValueId3='$RewardFactionValueId3',
				RewardFactionValueId4='$RewardFactionValueId4',
				RewardFactionValueId5='$RewardFactionValueId5',
				RewardFactionValueIdOverride1='$RewardFactionValueIdOverride1',
				RewardFactionValueIdOverride2='$RewardFactionValueIdOverride2',
				RewardFactionValueIdOverride3='$RewardFactionValueIdOverride3',
				RewardFactionValueIdOverride4='$RewardFactionValueIdOverride4',
				RewardFactionValueIdOverride5='$RewardFactionValueIdOverride5',
				PrevQuestId='$PrevQuestId',
				NextQuestId='$NextQuestId',
				MaxLevel='$MaxLevel',
				SourceSpellId='$SourceSpellId',
				ExclusiveGroup='$ExclusiveGroup',
				RequiredSkillId='$RequiredSkillId',
				RequiredSkillPoints='$RequiredSkillPoints',
				RequiredMinRepFaction='$RequiredMinRepFaction',
				RequiredMinRepValue='$RequiredMinRepValue',
				RequiredMaxRepFaction='$RequiredMaxRepFaction',
				RequiredMaxRepValue='$RequiredMaxRepValue',
				RewardMailTemplateId='$RewardMailTemplateId',
				RewardMailDelay='$RewardMailDelay',
				OfferRewardText='$OfferRewardText',
				OfferRewardEmote1='$OfferRewardEmote1',
				OfferRewardEmote2='$OfferRewardEmote2',
				OfferRewardEmote3='$OfferRewardEmote3',
				OfferRewardEmote4='$OfferRewardEmote4',
				OfferRewardEmoteDelay1='$OfferRewardEmoteDelay1',
				OfferRewardEmoteDelay2='$OfferRewardEmoteDelay2',
				OfferRewardEmoteDelay3='$OfferRewardEmoteDelay3',
				OfferRewardEmoteDelay4='$OfferRewardEmoteDelay4',
				RequestItemsText='$RequestItemsText',
				EmoteOnComplete='$EmoteOnComplete',
				EmoteOnIncomplete='$EmoteOnIncomplete',
				SourceItemCount='$SourceItemCount'
			WHERE Id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quest Form</title>
    <style>
        .fieldset-container {
            display: flex;
            justify-content: space-between;
        }
        .fieldset-container fieldset {
            width: 48%;
        }
		
    </style>
</head>
<body>
    <?php if ($quest): ?>
	<form id="questForm" method="POST" action="update_quest.php">
    <h2>Quest Details for ID: <?php echo $id; ?></h2>
	
        <div class="fieldset-container">

	    <fieldset>
            <legend>Base</legend>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $quest['Title']; ?>"><br>
        <label for="method">Method:</label>
        <select id="method" name="method">
            <option value="0" <?php if ($quest['Method'] == 0) echo 'selected'; ?>>Quest enabled, but is auto completed when accepted</option>
            <option value="1" <?php if ($quest['Method'] == 1) echo 'selected'; ?>>Quest Disabled</option>
            <option value="2" <?php if ($quest['Method'] == 2) echo 'selected'; ?>>Quest enabled no auto complete</option>
            <option value="3" <?php if ($quest['Method'] == 3) echo 'selected'; ?>>World Quest</option>
        </select><br>
        <label for="level">Level:</label>
        <input type="text" id="level" name="level" value="<?php echo $quest['Level']; ?>"><br>
        <label for="minLevel">MinLevel:</label>
        <input type="text" id="minLevel" name="minLevel" value="<?php echo $quest['MinLevel']; ?>"><br>
        <label for="zoneOrSort">ZoneOrSort:</label>
        <input type="text" id="zoneOrSort" name="zoneOrSort" value="<?php echo $quest['ZoneOrSort']; ?>"><br>
        <label for="type">Type:</label>
        <select id="type" name="type">
            <option value="0" <?php if ($quest['Type'] == 0) echo 'selected'; ?>>Normal</option>
            <option value="1" <?php if ($quest['Type'] == 1) echo 'selected'; ?>>Group</option>
            <option value="21" <?php if ($quest['Type'] == 21) echo 'selected'; ?>>Life</option>
            <option value="41" <?php if ($quest['Type'] == 41) echo 'selected'; ?>>PVP</option>
            <option value="62" <?php if ($quest['Type'] == 62) echo 'selected'; ?>>Raid</option>
            <option value="81" <?php if ($quest['Type'] == 81) echo 'selected'; ?>>Dungeon</option>
            <option value="82" <?php if ($quest['Type'] == 82) echo 'selected'; ?>>World Event</option>
            <option value="83" <?php if ($quest['Type'] == 83) echo 'selected'; ?>>Legendary</option>
            <option value="84" <?php if ($quest['Type'] == 84) echo 'selected'; ?>>Escort</option>
            <option value="85" <?php if ($quest['Type'] == 85) echo 'selected'; ?>>Heroic</option>
            <option value="88" <?php if ($quest['Type'] == 88) echo 'selected'; ?>>Raid (10)</option>
            <option value="89" <?php if ($quest['Type'] == 89) echo 'selected'; ?>>Raid (25)</option>
        </select><br>
        <label for="suggestedPlayers">SuggestedPlayers:</label>
        <input type="text" id="suggestedPlayers" name="suggestedPlayers" value="<?php echo $quest['SuggestedPlayers']; ?>"><br>
        <label for="sourceItemId">SourceItemId:</label>
        <input type="text" id="sourceItemId" name="sourceItemId" value="<?php echo $quest['SourceItemId']; ?>"><br>
		<label for="SourceItemCount">SourceItemCount:</label>
        <input type="text" id="SourceItemCount" name="SourceItemCount" value="<?php echo $quest['SourceItemCount']; ?>"><br>
        <label for="flags">Flags:</label>
        <input type="text" id="flags" name="flags" value="<?php echo $quest['Flags']; ?>"><br>
        <label for="limitTime">LimitTime:</label>
        <input type="text" id="limitTime" name="limitTime" value="<?php echo $quest['LimitTime']; ?>"><br>
        <label for="requiredRaces">RequiredRaces:</label>
        <input type="text" id="requiredRaces" name="requiredRaces" value="<?php echo $quest['RequiredRaces']; ?>"><br>
        <label for="requiredPlayerKills">RequiredPlayerKills:</label>
        <input type="text" id="requiredPlayerKills" name="requiredPlayerKills" value="<?php echo $quest['RequiredPlayerKills']; ?>"><br>
        <label for="requiredClasses">RequiredClasses:</label>
        <input type="text" id="requiredClasses" name="requiredClasses" value="<?php echo $quest['RequiredClasses']; ?>"><br>
        
		
        </fieldset>
      
		<fieldset>
			<Legend>Points of Interest</Legend>
		<label for="PointMapId">Point Map Id:</label>
        <input type="text" id="PointMapId" name="PointMapId" value="<?php echo htmlspecialchars($quest['PointMapId']); ?>"><br><br>
        <label for="PointX">Point X:</label>
        <input type="text" id="PointX" name="PointX" value="<?php echo htmlspecialchars($quest['PointX']); ?>"><br><br>
        <label for="PointY">Point Y:</label>
        <input type="text" id="PointY" name="PointY" value="<?php echo htmlspecialchars($quest['PointY']); ?>"><br><br>
        <label for="PointOption">Point Option:</label>
        <input type="text" id="PointOption" name="PointOption" value="<?php echo htmlspecialchars($quest['PointOption']); ?>"><br><br>
        
		</fieldset>
	
		<fieldset>
			<Legend>Texts</Legend>
		<label for="CompletedText">CompletedText:</label>
        <input type="text" id="CompletedText" name="CompletedText" size="85" value="<?php echo $quest['CompletedText']; ?>"><br>
		<label for="Details">Details:</label>
		<input type="text" id="Details" name="Details" size="85" value="<?php echo $quest['Details']; ?>"><br>
		<label for="EndText">EndText:</label>
        <input type="text" id="EndText" name="EndText" size="85" value="<?php echo $quest['EndText']; ?>"><br>
		<label for="Objectives">Objectives:</label>
        <input type="text" id="Objectives" name="Objectives" size="85"  value="<?php echo $quest['Objectives']; ?>"><br>
		</fieldset>
		</div>
		
		<div class="fieldset-container">
		
		<fieldset>
			<Legend>Required Items</Legend>
		<label for="RequiredItemId1">RequiredItemId1:</label>
		<input type="text" id="RequiredItemId1" name="RequiredItemId1" value="<?php echo $quest['RequiredItemId1']; ?>"><br>
		<label for="RequiredItemCount1">RequiredItemCount1:</label>
        <input type="text" id="RequiredItemCount1" name="RequiredItemCount1" value="<?php echo $quest['RequiredItemCount1']; ?>"><br>
		<label for="RequiredItemId2">RequiredItemId2:</label>
		<input type="text" id="RequiredItemId2" name="RequiredItemId2" value="<?php echo $quest['RequiredItemId2']; ?>"><br>
		<label for="RequiredItemCount2">RequiredItemCount2:</label>
        <input type="text" id="RequiredItemCount2" name="RequiredItemCount2" value="<?php echo $quest['RequiredItemCount2']; ?>"><br>
		<label for="RequiredItemId3">RequiredItemId3:</label>
		<input type="text" id="RequiredItemId3" name="RequiredItemId3" value="<?php echo $quest['RequiredItemId3']; ?>"><br>
		<label for="RequiredItemCount3">RequiredItemCount3:</label>
        <input type="text" id="RequiredItemCount3" name="RequiredItemCount3" value="<?php echo $quest['RequiredItemCount3']; ?>"><br>
		<label for="RequiredItemId4">RequiredItemId4:</label>
		<input type="text" id="RequiredItemId4" name="RequiredItemId4" value="<?php echo $quest['RequiredItemId4']; ?>"><br>
		<label for="RequiredItemCount4">RequiredItemCount4:</label>
        <input type="text" id="RequiredItemCount4" name="RequiredItemCount4" value="<?php echo $quest['RequiredItemCount4']; ?>"><br>
		<label for="RequiredItemId5">RequiredItemId5:</label>
		<input type="text" id="RequiredItemId5" name="RequiredItemId5" value="<?php echo $quest['RequiredItemId5']; ?>"><br>
		<label for="RequiredItemCount5">RequiredItemCount5:</label>
        <input type="text" id="RequiredItemCount5" name="RequiredItemCount5" value="<?php echo $quest['RequiredItemCount5']; ?>"><br>
		<label for="RequiredItemId6">RequiredItemId6:</label>
		<input type="text" id="RequiredItemId6" name="RequiredItemId6" value="<?php echo $quest['RequiredItemId6']; ?>"><br>
		<label for="RequiredItemCount6">RequiredItemCount6:</label>
        <input type="text" id="RequiredItemCount6" name="RequiredItemCount6" value="<?php echo $quest['RequiredItemCount6']; ?>"><br>
		</fieldset>

		<fieldset>
			<Legend>Required Npc or Go</Legend>
		<label for="RequiredNpcOrGo1">RequiredNpcOrGo1:</label>
		<input type="text" id="RequiredNpcOrGo1" name="RequiredNpcOrGo1" value="<?php echo $quest['RequiredNpcOrGo1']; ?>"><br>
		<label for="RequiredNpcOrGoCount1">RequiredNpcOrGoCount1:</label>
        <input type="text" id="RequiredNpcOrGoCount1" name="RequiredNpcOrGoCount1" value="<?php echo $quest['RequiredNpcOrGoCount1']; ?>"><br>
		<label for="RequiredNpcOrGo2">RequiredNpcOrGo2:</label>
		<input type="text" id="RequiredNpcOrGo2" name="RequiredNpcOrGo2" value="<?php echo $quest['RequiredNpcOrGo2']; ?>"><br>
		<label for="RequiredNpcOrGoCount2">RequiredNpcOrGoCount2:</label>
        <input type="text" id="RequiredNpcOrGoCount2" name="RequiredNpcOrGoCount2" value="<?php echo $quest['RequiredNpcOrGoCount2']; ?>"><br>
		<label for="RequiredNpcOrGo3">RequiredNpcOrGo3:</label>
		<input type="text" id="RequiredNpcOrGo3" name="RequiredNpcOrGo3" value="<?php echo $quest['RequiredNpcOrGo3']; ?>"><br>
		<label for="RequiredNpcOrGoCount3">RequiredNpcOrGoCount3:</label>
        <input type="text" id="RequiredNpcOrGoCount3" name="RequiredNpcOrGoCount3" value="<?php echo $quest['RequiredNpcOrGoCount3']; ?>"><br>
		<label for="RequiredNpcOrGo4">RequiredNpcOrGo4:</label>
		<input type="text" id="RequiredNpcOrGo4" name="RequiredNpcOrGo4" value="<?php echo $quest['RequiredNpcOrGo4']; ?>"><br>
		<label for="RequiredNpcOrGoCount4">RequiredNpcOrGoCount4:</label>
        <input type="text" id="RequiredNpcOrGoCount4" name="RequiredNpcOrGoCount4" value="<?php echo $quest['RequiredNpcOrGoCount4']; ?>"><br>
		<label for="RequiredFactionId1">RequiredFactionId1:</label>
		<input type="text" id="RequiredFactionId1" name="RequiredFactionId1" value="<?php echo $quest['RequiredFactionId1']; ?>"><br>
		<label for="RequiredFactionValue1">RequiredFactionValue1:</label>
        <input type="text" id="RequiredFactionValue1" name="RequiredFactionValue1" value="<?php echo $quest['RequiredFactionValue1']; ?>"><br>
		<label for="RequiredFactionId2">RequiredFactionId2:</label>
		<input type="text" id="RequiredFactionId2" name="RequiredFactionId2" value="<?php echo $quest['RequiredFactionId2']; ?>"><br>
		<label for="RequiredFactionValue2">RequiredFactionValue2:</label>
        <input type="text" id="RequiredFactionValue2" name="RequiredFactionValue2" value="<?php echo $quest['RequiredFactionValue2']; ?>"><br>
		</fieldset>
		
		<fieldset>
			<Legend>Item Drops</Legend>
		<label for="RequiredSourceItemId1">RequiredSourceItem1Id:</label>
		<input type="text" id="RequiredSourceItemId1" name="RequiredSourceItemId1" value="<?php echo $quest['RequiredSourceItemId1']; ?>"><br>
		<label for="RequiredSourceItemCount1">RequiredSourceItemCount1:</label>
        <input type="text" id="RequiredSourceItemCount1" name="RequiredSourceItemCount1" value="<?php echo $quest['RequiredSourceItemCount1']; ?>"><br>
		<label for="RequiredSourceItemId2">RequiredSourceItemId2:</label>
		<input type="text" id="RequiredSourceItemId2" name="RequiredSourceItemId2" value="<?php echo $quest['RequiredSourceItemId2']; ?>"><br>
		<label for="RequiredSourceItemCount2">RequiredSourceItemCount2:</label>
        <input type="text" id="RequiredSourceItemCount2" name="RequiredSourceItemCount2" value="<?php echo $quest['RequiredSourceItemCount2']; ?>"><br>
		<label for="RequiredSourceItemId3">RequiredSourceItemId3:</label>
		<input type="text" id="RequiredSourceItemId3" name="RequiredSourceItemId3" value="<?php echo $quest['RequiredSourceItemId3']; ?>"><br>
		<label for="RequiredSourceItemCount3">RequiredSourceItemCount3:</label>
        <input type="text" id="RequiredSourceItemCount3" name="RequiredSourceItemCount3" value="<?php echo $quest['RequiredSourceItemCount3']; ?>"><br>
		<label for="RequiredSourceItemId4">RequiredSourceItemId4:</label>
		<input type="text" id="RequiredSourceItemId4" name="RequiredSourceItemId4" value="<?php echo $quest['RequiredSourceItemId4']; ?>"><br>
		<label for="RequiredSourceItemCount4">RequiredSourceItemCount4:</label>
        <input type="text" id="RequiredSourceItemCount4" name="RequiredSourceItemCount4" value="<?php echo $quest['RequiredSourceItemCount4']; ?>"><br>
		</fieldset>
		
		<fieldset>
			<Legend>Objective Texts</Legend>
		<label for="ObjectiveText1">ObjectiveText1:</label>
		<input type="text" id="ObjectiveText1" name="ObjectiveText1" size="66" value="<?php echo $quest['ObjectiveText1']; ?>"><br>
		<label for="ObjectiveText2">ObjectiveText2:</label>
        <input type="text" id="ObjectiveText2" name="ObjectiveText2" size="66" value="<?php echo $quest['ObjectiveText2']; ?>"><br>
		<label for="ObjectiveText3">ObjectiveText3:</label>
        <input type="text" id="ObjectiveText3" name="ObjectiveText3" size="66" value="<?php echo $quest['ObjectiveText3']; ?>"><br>
		<label for="ObjectiveText4">ObjectiveText4:</label>
        <input type="text" id="ObjectiveText4" name="ObjectiveText4" size="66" value="<?php echo $quest['ObjectiveText4']; ?>"><br>
		</fieldset>
		</div>
		
		<div class="fieldset-container">
		
		<fieldset>
			<Legend>Rewards</Legend>
		<label for="RewardTitleId">RewardTitleId:</label>
		<input type="text" id="RewardTitleId" name="RewardTitleId" value="<?php echo $quest['RewardTitleId']; ?>"><br>
		<label for="RewardTalents">RewardTalents:</label>
        <input type="text" id="RewardTalents" name="RewardTalents" value="<?php echo $quest['RewardTalents']; ?>"><br>
		<label for="RewardArenaPoints">RewardArenaPoints:</label>
		<input type="text" id="RewardArenaPoints" name="RewardArenaPoints" value="<?php echo $quest['RewardArenaPoints']; ?>"><br>
		<label for="NextQuestIdChain">NextQuestIdChain:</label>
        <input type="text" id="NextQuestIdChain" name="NextQuestIdChain" value="<?php echo $quest['NextQuestIdChain']; ?>"><br>
		<label for="RewardXPId">RewardXPId:</label>
        <input type="text" id="RewardXPId" name="RewardXPId" value="<?php echo $quest['RewardXPId']; ?>"><br>
		<label for="RewardOrRequiredMoney">RewardOrRequiredMoney:</label>
		<input type="text" id="RewardOrRequiredMoney" name="RewardOrRequiredMoney" value="<?php echo $quest['RewardOrRequiredMoney']; ?>"><br>
		<label for="RewardSpell">RewardSpell:</label>
        <input type="text" id="RewardSpell" name="RewardSpell" value="<?php echo $quest['RewardSpell']; ?>"><br>
		<label for="RewardSpellCast">RewardSpellCast:</label>
        <input type="text" id="RewardSpellCast" name="RewardSpellCast" value="<?php echo $quest['RewardSpellCast']; ?>"><br>
		<label for="RewardHonor">RewardHonor:</label>
		<input type="text" id="RewardHonor" name="RewardHonor" value="<?php echo $quest['RewardHonor']; ?>"><br>
		<label for="RewardHonorMultiplier">RewardHonorMultiplier:</label>
        <input type="text" id="RewardHonorMultiplier" name="RewardHonorMultiplier" value="<?php echo $quest['RewardHonorMultiplier']; ?>"><br>
		</fieldset>
	
		<fieldset>
			<Legend>Reward Items</Legend>
		<label for="RewardItemId1">RewardItemId1:</label>
		<input type="text" id="RewardItemId1" name="RewardItemId1" value="<?php echo $quest['RewardItemId1']; ?>"><br>
		<label for="RewardItemCount1">RewardItemCount1:</label>
        <input type="text" id="RewardItemCount1" name="RewardItemCount1" value="<?php echo $quest['RewardItemCount1']; ?>"><br>
		<label for="RewardItemId2">RewardItemId2:</label>
        <input type="text" id="RewardItemId2" name="RewardItemId2" value="<?php echo $quest['RewardItemId2']; ?>"><br>
		<label for="RewardItemCount2">RewardItemCount2:</label>
		<input type="text" id="RewardItemCount2" name="RewardItemCount2" value="<?php echo $quest['RewardItemCount2']; ?>"><br>
		<label for="RewardItemId3">RewardItemId3:</label>
        <input type="text" id="RewardItemId3" name="RewardItemId3" value="<?php echo $quest['RewardItemId3']; ?>"><br>
		<label for="RewardItemCount3">RewardItemCount3:</label>
        <input type="text" id="RewardItemCount3" name="RewardItemCount3" value="<?php echo $quest['RewardItemCount3']; ?>"><br>
		<label for="RewardItemId4">RewardItemId4:</label>
		<input type="text" id="RewardItemId4" name="RewardItemId4" value="<?php echo $quest['RewardItemId4']; ?>"><br>
		<label for="RewardItemCount4">RewardItemCount4:</label>
        <input type="text" id="RewardItemCount4" name="RewardItemCount4" value="<?php echo $quest['RewardItemCount4']; ?>"><br>
		</fieldset>
		
		<fieldset>
			<Legend>Choice Rewards</Legend>
		<label for="RewardChoiceItemId1">RewardChoiceItemId1:</label>
		<input type="text" id="RewardChoiceItemId1" name="RewardChoiceItemId1" value="<?php echo $quest['RewardChoiceItemId1']; ?>"><br>
		<label for="RewardChoiceItemCount1">RewardChoiceItemCount1:</label>
        <input type="text" id="RewardChoiceItemCount1" name="RewardChoiceItemCount1" value="<?php echo $quest['RewardChoiceItemCount1']; ?>"><br>
		<label for="RewardChoiceItemId2">RewardChoiceItemId2:</label>
        <input type="text" id="RewardChoiceItemId2" name="RewardChoiceItemId2" value="<?php echo $quest['RewardChoiceItemId2']; ?>"><br>
		<label for="RewardChoiceItemCount2">RewardChoiceItemCount2:</label>
		<input type="text" id="RewardChoiceItemCount2" name="RewardChoiceItemCount2" value="<?php echo $quest['RewardChoiceItemCount2']; ?>"><br>
		<label for="RewardChoiceItemId3">RewardChoiceItemId3:</label>
        <input type="text" id="RewardChoiceItemId3" name="RewardChoiceItemId3" value="<?php echo $quest['RewardChoiceItemId3']; ?>"><br>
		<label for="RewardChoiceItemCount3">RewardChoiceItemCount3:</label>
        <input type="text" id="RewardChoiceItemCount3" name="RewardChoiceItemCount3" value="<?php echo $quest['RewardChoiceItemCount3']; ?>"><br>
		<label for="RewardChoiceItemId4">RewardChoiceItemId4:</label>
		<input type="text" id="RewardChoiceItemId4" name="RewardChoiceItemId4" value="<?php echo $quest['RewardChoiceItemId4']; ?>"><br>
		<label for="RewardChoiceItemCount4">RewardChoiceItemCount4:</label>
        <input type="text" id="RewardChoiceItemCount4" name="RewardChoiceItemCount4" value="<?php echo $quest['RewardChoiceItemCount4']; ?>"><br>
		<label for="RewardChoiceItemId5">RewardChoiceItemId5:</label>
		<input type="text" id="RewardChoiceItemId5" name="RewardChoiceItemId5" value="<?php echo $quest['RewardChoiceItemId5']; ?>"><br>
		<label for="RewardChoiceItemCount5">RewardChoiceItemCount5:</label>
        <input type="text" id="RewardChoiceItemCount5" name="RewardChoiceItemCount5" value="<?php echo $quest['RewardChoiceItemCount5']; ?>"><br>
		<label for="RewardChoiceItemId6">RewardChoiceItemId6:</label>
        <input type="text" id="RewardChoiceItemId6" name="RewardChoiceItemId6" value="<?php echo $quest['RewardChoiceItemId6']; ?>"><br>
		<label for="RewardChoiceItemCount6">RewardChoiceItemCount6:</label>
		<input type="text" id="RewardChoiceItemCount6" name="RewardChoiceItemCount6" value="<?php echo $quest['RewardChoiceItemCount6']; ?>"><br>
		</fieldset>

</div>

		<div class="fieldset-container">

		<fieldset>
			<Legend>Rewards Factions</Legend>
		<label for="RewardFactionId1">RewardFactionId1:</label>
		<input type="text" id="RewardFactionId1" name="RewardFactionId1" value="<?php echo $quest['RewardFactionId1']; ?>"><br>
		<label for="RewardFactionValueId1">RewardFactionValueId1:</label>
        <input type="text" id="RewardFactionValueId1" name="RewardFactionValueId1" value="<?php echo $quest['RewardFactionValueId1']; ?>"><br>
		<label for="RewardFactionValueIdOverride1">RewardFactionValueIdOverride1:</label>
        <input type="text" id="RewardFactionValueIdOverride1" name="RewardFactionValueIdOverride1" value="<?php echo $quest['RewardFactionValueIdOverride1']; ?>"><br>
		<label for="RewardFactionId2">RewardFactionId2:</label>
		<input type="text" id="RewardFactionId2" name="RewardFactionId2" value="<?php echo $quest['RewardFactionId2']; ?>"><br>
		<label for="RewardFactionValueId2">RewardFactionValueId2:</label>
        <input type="text" id="RewardFactionValueId2" name="RewardFactionValueId2" value="<?php echo $quest['RewardFactionValueId2']; ?>"><br>
		<label for="RewardFactionValueIdOverride2">RewardFactionValueIdOverride2:</label>
        <input type="text" id="RewardFactionValueIdOverride2" name="RewardFactionValueIdOverride2" value="<?php echo $quest['RewardFactionValueIdOverride2']; ?>"><br>
		<label for="RewardFactionId3">RewardFactionId3:</label>
		<input type="text" id="RewardFactionId3" name="RewardFactionId3" value="<?php echo $quest['RewardFactionId3']; ?>"><br>
		<label for="RewardFactionValueId3">RewardFactionValueId3:</label>
        <input type="text" id="RewardFactionValueId3" name="RewardFactionValueId3" value="<?php echo $quest['RewardFactionValueId3']; ?>"><br>
		<label for="RewardFactionValueIdOverride3">RewardFactionValueIdOverride3:</label>
		<input type="text" id="RewardFactionValueIdOverride3" name="RewardFactionValueIdOverride3" value="<?php echo $quest['RewardFactionValueIdOverride3']; ?>"><br>
		<label for="RewardFactionId4">RewardFactionId4:</label>
        <input type="text" id="RewardFactionId4" name="RewardFactionId4" value="<?php echo $quest['RewardFactionId4']; ?>"><br>
		<label for="RewardFactionValueId4">RewardFactionValueId4:</label>
        <input type="text" id="RewardFactionValueId4" name="RewardFactionValueId4" value="<?php echo $quest['RewardFactionValueId4']; ?>"><br>
		<label for="RewardFactionValueIdOverride4">RewardFactionValueIdOverride4:</label>
		<input type="text" id="RewardFactionValueIdOverride4" name="RewardFactionValueIdOverride4" value="<?php echo $quest['RewardFactionValueIdOverride4']; ?>"><br>
		<label for="RewardFactionId5">RewardFactionId5:</label>
		<input type="text" id="RewardFactionId5" name="RewardFactionId5" value="<?php echo $quest['RewardFactionId5']; ?>"><br>
		<label for="RewardFactionValueId5">RewardFactionValueId5:</label>
        <input type="text" id="RewardFactionValueId5" name="RewardFactionValueId5" value="<?php echo $quest['RewardFactionValueId5']; ?>"><br>
		<label for="RewardFactionValueIdOverride5">RewardFactionValueIdOverride5:</label>
		<input type="text" id="RewardFactionValueIdOverride5" name="RewardFactionValueIdOverride5" value="<?php echo $quest['RewardFactionValueIdOverride5']; ?>"><br>
		</fieldset>
	
			<fieldset>
			<Legend>Base Addon</Legend>
		<label for="PrevQuestId">PrevQuestId:</label>
        <input type="text" id="PrevQuestId" name="PrevQuestId" value="<?php echo $quest['PrevQuestId']; ?>"><br>
		<label for="NextQuestId">NextQuestId:</label>
        <input type="text" id="NextQuestId" name="NextQuestId" value="<?php echo $quest['NextQuestId']; ?>"><br>
		<label for="MaxLevel">MaxLevel:</label>
		<input type="text" id="MaxLevel" name="MaxLevel" value="<?php echo $quest['MaxLevel']; ?>"><br>
		<label for="specialflags">SpecialFlags:</label>
        <input type="text" id="specialflags" name="specialflags" value="<?php echo $quest['SpecialFlags']; ?>"><br>
		<label for="SourceSpellId">SourceSpellId:</label>
        <input type="text" id="SourceSpellId" name="SourceSpellId" value="<?php echo $quest['SourceSpellId']; ?>"><br>
		<label for="ExclusiveGroup">ExclusiveGroup:</label>
		<input type="text" id="ExclusiveGroup" name="ExclusiveGroup" value="<?php echo $quest['ExclusiveGroup']; ?>"><br>
		<label for="RequiredSkillId">RequiredSkillId:</label>
		<input type="text" id="RequiredSkillId" name="RequiredSkillId" value="<?php echo $quest['RequiredSkillId']; ?>"><br>
		<label for="RequiredSkillPoints">RequiredSkillPoints:</label>
        <input type="text" id="RequiredSkillPoints" name="RequiredSkillPoints" value="<?php echo $quest['RequiredSkillPoints']; ?>"><br>
		<label for="RequiredMinRepFaction">RequiredMinRepFaction:</label>
		<input type="text" id="RequiredMinRepFaction" name="RequiredMinRepFaction" value="<?php echo $quest['RequiredMinRepFaction']; ?>"><br>
		<label for="RequiredMinRepValue">RequiredMinRepValue:</label>
        <input type="text" id="RequiredMinRepValue" name="RequiredMinRepValue" value="<?php echo $quest['RequiredMinRepValue']; ?>"><br>
		<label for="RequiredMaxRepFaction">RequiredMaxRepFaction:</label>
        <input type="text" id="RequiredMaxRepFaction" name="RequiredMaxRepFaction" value="<?php echo $quest['RequiredMaxRepFaction']; ?>"><br>
		<label for="RequiredMaxRepValue">RequiredMaxRepValue:</label>
		<input type="text" id="RequiredMaxRepValue" name="RequiredMaxRepValue" value="<?php echo $quest['RequiredMaxRepValue']; ?>"><br>
		<label for="RewardMailTemplateId">RewardMailTemplateId:</label>
        <input type="text" id="RewardMailTemplateId" name="RewardMailTemplateId" value="<?php echo $quest['RewardMailTemplateId']; ?>"><br>
		<label for="RewardMailDelay">RewardMailDelay:</label>
        <input type="text" id="RewardMailDelay" name="RewardMailDelay" value="<?php echo $quest['RewardMailDelay']; ?>"><br>
		</fieldset>
		
		<fieldset>
			<Legend>Offer Reward</Legend>
		<label for="OfferRewardText">OfferRewardText:</label>
		<input type="text" id="OfferRewardText" name="OfferRewardText" size="100" value="<?php echo $quest['OfferRewardText']; ?>"><br>
		<label for="OfferRewardEmote1">OfferRewardEmote1:</label>
        <input type="text" id="OfferRewardEmote1" name="OfferRewardEmote1" value="<?php echo $quest['OfferRewardEmote1']; ?>"><br>
		<label for="OfferRewardEmoteDelay1">OfferRewardEmoteDelay1:</label>
		<input type="text" id="OfferRewardEmoteDelay1" name="OfferRewardEmoteDelay1" value="<?php echo $quest['OfferRewardEmoteDelay1']; ?>"><br>
		<label for="OfferRewardEmote2">OfferRewardEmote2:</label>
        <input type="text" id="OfferRewardEmote2" name="OfferRewardEmote2" value="<?php echo $quest['OfferRewardEmote2']; ?>"><br>
		<label for="OfferRewardEmoteDelay2">OfferRewardEmoteDelay2:</label>
        <input type="text" id="OfferRewardEmoteDelay2" name="OfferRewardEmoteDelay2" value="<?php echo $quest['OfferRewardEmoteDelay2']; ?>"><br>
		<label for="OfferRewardEmote3">OfferRewardEmote3:</label>
        <input type="text" id="OfferRewardEmote3" name="OfferRewardEmote3" value="<?php echo $quest['OfferRewardEmote3']; ?>"><br>
		<label for="OfferRewardEmoteDelay3">OfferRewardEmoteDelay3:</label>
        <input type="text" id="OfferRewardEmoteDelay3" name="OfferRewardEmoteDelay3" value="<?php echo $quest['OfferRewardEmoteDelay3']; ?>"><br>
		<label for="OfferRewardEmote4">OfferRewardEmote4:</label>
		<input type="text" id="OfferRewardEmote4" name="OfferRewardEmote4" value="<?php echo $quest['OfferRewardEmote4']; ?>"><br>
		<label for="OfferRewardEmoteDelay4">OfferRewardEmoteDelay4:</label>
        <input type="text" id="OfferRewardEmoteDelay4" name="OfferRewardEmoteDelay4" value="<?php echo $quest['OfferRewardEmoteDelay4']; ?>"><br>
		<label for="RequestItemsText">RequestItemsText:</label>
        <input type="text" id="RequestItemsText" name="RequestItemsText" size="100" value="<?php echo $quest['RequestItemsText']; ?>"><br>
		<label for="EmoteOnComplete">EmoteOnComplete:</label>
		<input type="text" id="EmoteOnComplete" name="EmoteOnComplete" value="<?php echo $quest['EmoteOnComplete']; ?>"><br>
		<label for="EmoteOnIncomplete">EmoteOnIncomplete:</label>
        <input type="text" id="EmoteOnIncomplete" name="EmoteOnIncomplete" value="<?php echo $quest['EmoteOnIncomplete']; ?>"><br>
		</fieldset>
		</div>
			
		
		
        <input type="hidden" name="ip" value="<?php echo htmlspecialchars($ip); ?>">
        <input type="hidden" name="port" value="<?php echo htmlspecialchars($port); ?>">
        <input type="hidden" name="user" value="<?php echo htmlspecialchars($user); ?>">
        <input type="hidden" name="password" value="<?php echo htmlspecialchars($password); ?>">
        <input type="hidden" name="dbname" value="<?php echo htmlspecialchars($dbname); ?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        
        <button type="button" onclick="navigateToCreate()">Back to Create</button>
        <button type="button" onclick="window.open('calc.php', '_blank')">Race, Flags, Class Calculator</button>
        <button type="button" onclick="openCreature()">Creature Start/End</button>
		<button type="button" onclick="OpenQuestLoot()">Creature Quest Loot</button>
		<button type="button" onclick="openObject()">Object Start/End</button>
		<button type="button" onclick="openItem()">Item Lookup</button>
		<button type="button" onclick="saveQuest()">Save</button>
    </form>
	
    <script>
	
	function OpenQuestLoot() {
            var params = [
                'ip=' + document.getElementsByName('ip')[0].value,
                'port=' + document.getElementsByName('port')[0].value,
                'user=' + document.getElementsByName('user')[0].value,
                'password=' + document.getElementsByName('password')[0].value,
                'dbname=' + document.getElementsByName('dbname')[0].value,
                'id=' + document.getElementsByName('id')[0].value
            ].join('&');

            var url = 'quest_loot_search.php?' + params;
            window.open(url, '_blank');
        }
	
	
	
	
	
	
	
	
	
        function navigateToCreate() {
            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "create.php");

            var fields = ["ip", "port", "user", "password", "dbname"];
            fields.forEach(function(field) {
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", field);
                hiddenField.setAttribute("value", document.getElementsByName(field)[0].value);
                form.appendChild(hiddenField);
            });

            document.body.appendChild(form);
            form.submit();
        }
		
		function openCreature() {
            var params = [
                'ip=' + document.getElementsByName('ip')[0].value,
                'port=' + document.getElementsByName('port')[0].value,
                'user=' + document.getElementsByName('user')[0].value,
                'password=' + document.getElementsByName('password')[0].value,
                'dbname=' + document.getElementsByName('dbname')[0].value,
                'id=' + document.getElementsByName('id')[0].value
            ].join('&');

            var url = 'creature.php?' + params;
            window.open(url, '_blank');
        }
		
		function openObject() {
            var params = [
                'ip=' + document.getElementsByName('ip')[0].value,
                'port=' + document.getElementsByName('port')[0].value,
                'user=' + document.getElementsByName('user')[0].value,
                'password=' + document.getElementsByName('password')[0].value,
                'dbname=' + document.getElementsByName('dbname')[0].value,
                'id=' + document.getElementsByName('id')[0].value
            ].join('&');

            var url = 'object.php?' + params;
            window.open(url, '_blank');
        }
		
		function openItem() {
            var params = [
                'ip=' + document.getElementsByName('ip')[0].value,
                'port=' + document.getElementsByName('port')[0].value,
                'user=' + document.getElementsByName('user')[0].value,
                'password=' + document.getElementsByName('password')[0].value,
                'dbname=' + document.getElementsByName('dbname')[0].value
                 ].join('&');

            var url = 'item.php?' + params;
            window.open(url, '_blank');
        }
		
		function saveQuest() {
            if (confirm("Are you sure you want to save changes?")) {
                document.getElementById("questForm").submit();
            }
        }
    </script>
    </script>
    <?php endif; ?>
</body>
</html>
