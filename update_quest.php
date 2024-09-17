<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// Retrieve form data
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
	$specialflags = $_POST['specialflags'];
	$SourceItemCount = $_POST['SourceItemCount'];
	$NextQuestIdChain = $_POST['NextQuestIdChain'];

// Create connection
$conn = new mysqli($ip, $user, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape form input data to prevent SQL errors

				$title = mysqli_real_escape_string($conn, $_POST['title']);
                $method = mysqli_real_escape_string($conn, $_POST['method']);
                $level = mysqli_real_escape_string($conn, $_POST['level']);
                $minLevel = mysqli_real_escape_string($conn, $_POST['minLevel']);
                $zoneOrSort = mysqli_real_escape_string($conn, $_POST['zoneOrSort']);
                $type = mysqli_real_escape_string($conn, $_POST['type']);
                $suggestedPlayers = mysqli_real_escape_string($conn, $_POST['suggestedPlayers']);
                $sourceItemId = mysqli_real_escape_string($conn, $_POST['sourceItemId']);
                $flags = mysqli_real_escape_string($conn, $_POST['flags']);
                $limitTime = mysqli_real_escape_string($conn, $_POST['limitTime']);
                $requiredRaces = mysqli_real_escape_string($conn, $_POST['requiredRaces']);
                $requiredPlayerKills = mysqli_real_escape_string($conn, $_POST['requiredPlayerKills']);
                $requiredClasses = mysqli_real_escape_string($conn, $_POST['requiredClasses']);
				$PointMapId = mysqli_real_escape_string($conn, $_POST['PointMapId']);
                $PointX = mysqli_real_escape_string($conn, $_POST['PointX']);
                $PointY = mysqli_real_escape_string($conn, $_POST['PointY']);
                $PointOption = mysqli_real_escape_string($conn, $_POST['PointOption']);
				$CompletedText = mysqli_real_escape_string($conn, $_POST['CompletedText']);
				$Details = mysqli_real_escape_string($conn, $_POST['Details']);
				$EndText = mysqli_real_escape_string($conn, $_POST['EndText']);
				$Objectives = mysqli_real_escape_string($conn, $_POST['Objectives']);
				$ObjectiveText1 = mysqli_real_escape_string($conn, $_POST['ObjectiveText1']);
				$ObjectiveText2 = mysqli_real_escape_string($conn, $_POST['ObjectiveText2']);
				$ObjectiveText3 = mysqli_real_escape_string($conn, $_POST['ObjectiveText3']);
				$ObjectiveText4 = mysqli_real_escape_string($conn, $_POST['ObjectiveText4']);
				$RequiredItemId1 = mysqli_real_escape_string($conn, $_POST['RequiredItemId1']);
				$RequiredItemId2 = mysqli_real_escape_string($conn, $_POST['RequiredItemId2']);
				$RequiredItemId3 = mysqli_real_escape_string($conn, $_POST['RequiredItemId3']);
				$RequiredItemId4 = mysqli_real_escape_string($conn, $_POST['RequiredItemId4']);
				$RequiredItemId5 = mysqli_real_escape_string($conn, $_POST['RequiredItemId5']);
				$RequiredItemId6 = mysqli_real_escape_string($conn, $_POST['RequiredItemId6']);
				$RequiredItemCount1 = mysqli_real_escape_string($conn, $_POST['RequiredItemCount1']);
				$RequiredItemCount2 = mysqli_real_escape_string($conn, $_POST['RequiredItemCount2']);
				$RequiredItemCount3 = mysqli_real_escape_string($conn, $_POST['RequiredItemCount3']);
				$RequiredItemCount4 = mysqli_real_escape_string($conn, $_POST['RequiredItemCount4']);
				$RequiredItemCount5 = mysqli_real_escape_string($conn, $_POST['RequiredItemCount5']);
				$RequiredItemCount6 = mysqli_real_escape_string($conn, $_POST['RequiredItemCount6']);
				$RequiredNpcOrGo1 = mysqli_real_escape_string($conn, $_POST['RequiredNpcOrGo1']);
				$RequiredNpcOrGo2 = mysqli_real_escape_string($conn, $_POST['RequiredNpcOrGo2']);
				$RequiredNpcOrGo3 = mysqli_real_escape_string($conn, $_POST['RequiredNpcOrGo3']);
				$RequiredNpcOrGo4 = mysqli_real_escape_string($conn, $_POST['RequiredNpcOrGo4']);
				$RequiredNpcOrGoCount1 = mysqli_real_escape_string($conn, $_POST['RequiredNpcOrGoCount1']);
				$RequiredNpcOrGoCount2 = mysqli_real_escape_string($conn, $_POST['RequiredNpcOrGoCount2']);
				$RequiredNpcOrGoCount3 = mysqli_real_escape_string($conn, $_POST['RequiredNpcOrGoCount3']);
				$RequiredNpcOrGoCount4 = mysqli_real_escape_string($conn, $_POST['RequiredNpcOrGoCount4']);
				$RequiredFactionId1 = mysqli_real_escape_string($conn, $_POST['RequiredFactionId1']);
				$RequiredFactionId2 = mysqli_real_escape_string($conn, $_POST['RequiredFactionId2']);
				$RequiredFactionValue1 = mysqli_real_escape_string($conn, $_POST['RequiredFactionValue1']);
				$RequiredFactionValue2 = mysqli_real_escape_string($conn, $_POST['RequiredFactionValue2']);
				$RequiredSourceItemId1 = mysqli_real_escape_string($conn, $_POST['RequiredSourceItemId1']);
				$RequiredSourceItemId2 = mysqli_real_escape_string($conn, $_POST['RequiredSourceItemId2']);
				$RequiredSourceItemId3 = mysqli_real_escape_string($conn, $_POST['RequiredSourceItemId3']);
				$RequiredSourceItemId4 = mysqli_real_escape_string($conn, $_POST['RequiredSourceItemId4']);
				$RequiredSourceItemCount1 = mysqli_real_escape_string($conn, $_POST['RequiredSourceItemCount1']);
				$RequiredSourceItemCount2 = mysqli_real_escape_string($conn, $_POST['RequiredSourceItemCount2']);
				$RequiredSourceItemCount3 = mysqli_real_escape_string($conn, $_POST['RequiredSourceItemCount3']);
				$RequiredSourceItemCount4 = mysqli_real_escape_string($conn, $_POST['RequiredSourceItemCount4']);
				$RewardTitleId = mysqli_real_escape_string($conn, $_POST['RewardTitleId']);
				$RewardTalents = mysqli_real_escape_string($conn, $_POST['RewardTalents']);
				$RewardArenaPoints = mysqli_real_escape_string($conn, $_POST['RewardArenaPoints']);
				$RewardXPId = mysqli_real_escape_string($conn, $_POST['RewardXPId']);
				$RewardOrRequiredMoney = mysqli_real_escape_string($conn, $_POST['RewardOrRequiredMoney']);
				$RewardSpell = mysqli_real_escape_string($conn, $_POST['RewardSpell']);
				$RewardSpellCast = mysqli_real_escape_string($conn, $_POST['RewardSpellCast']);
				$RewardHonor = mysqli_real_escape_string($conn, $_POST['RewardHonor']);
				$RewardHonorMultiplier = mysqli_real_escape_string($conn, $_POST['RewardHonorMultiplier']);
				$RewardItemCount1 = mysqli_real_escape_string($conn, $_POST['RewardItemCount1']);
				$RewardItemCount2 = mysqli_real_escape_string($conn, $_POST['RewardItemCount2']);
				$RewardItemCount3 = mysqli_real_escape_string($conn, $_POST['RewardItemCount3']);
				$RewardItemCount4 = mysqli_real_escape_string($conn, $_POST['RewardItemCount4']);
				$RewardItemId1 = mysqli_real_escape_string($conn, $_POST['RewardItemId1']);
				$RewardItemId2 = mysqli_real_escape_string($conn, $_POST['RewardItemId2']);
				$RewardItemId3 = mysqli_real_escape_string($conn, $_POST['RewardItemId3']);
				$RewardItemId4 = mysqli_real_escape_string($conn, $_POST['RewardItemId4']);
				$RewardChoiceItemId1 = mysqli_real_escape_string($conn, $_POST['RewardChoiceItemId1']);
				$RewardChoiceItemId2 = mysqli_real_escape_string($conn, $_POST['RewardChoiceItemId2']);
				$RewardChoiceItemId3 = mysqli_real_escape_string($conn, $_POST['RewardChoiceItemId3']);
				$RewardChoiceItemId4 = mysqli_real_escape_string($conn, $_POST['RewardChoiceItemId4']);
				$RewardChoiceItemId5 = mysqli_real_escape_string($conn, $_POST['RewardChoiceItemId5']);
				$RewardChoiceItemId6 = mysqli_real_escape_string($conn, $_POST['RewardChoiceItemId6']);
				$RewardChoiceItemCount1 = mysqli_real_escape_string($conn, $_POST['RewardChoiceItemCount1']);
				$RewardChoiceItemCount2 = mysqli_real_escape_string($conn, $_POST['RewardChoiceItemCount2']);
				$RewardChoiceItemCount3 = mysqli_real_escape_string($conn, $_POST['RewardChoiceItemCount3']);
				$RewardChoiceItemCount4 = mysqli_real_escape_string($conn, $_POST['RewardChoiceItemCount4']);
				$RewardChoiceItemCount5 = mysqli_real_escape_string($conn, $_POST['RewardChoiceItemCount5']);
				$RewardChoiceItemCount6 = mysqli_real_escape_string($conn, $_POST['RewardChoiceItemCount6']);
				$RewardFactionId1 = mysqli_real_escape_string($conn, $_POST['RewardFactionId1']);
				$RewardFactionId2 = mysqli_real_escape_string($conn, $_POST['RewardFactionId2']);
				$RewardFactionId3 = mysqli_real_escape_string($conn, $_POST['RewardFactionId3']);
				$RewardFactionId4 = mysqli_real_escape_string($conn, $_POST['RewardFactionId4']);
				$RewardFactionId5 = mysqli_real_escape_string($conn, $_POST['RewardFactionId5']);
				$RewardFactionValueId1 = mysqli_real_escape_string($conn, $_POST['RewardFactionValueId1']);
				$RewardFactionValueId2 = mysqli_real_escape_string($conn, $_POST['RewardFactionValueId2']);
				$RewardFactionValueId3 = mysqli_real_escape_string($conn, $_POST['RewardFactionValueId3']);
				$RewardFactionValueId4 = mysqli_real_escape_string($conn, $_POST['RewardFactionValueId4']);
				$RewardFactionValueId5 = mysqli_real_escape_string($conn, $_POST['RewardFactionValueId5']);
				$RewardFactionValueIdOverride1 = mysqli_real_escape_string($conn, $_POST['RewardFactionValueIdOverride1']);
				$RewardFactionValueIdOverride2 = mysqli_real_escape_string($conn, $_POST['RewardFactionValueIdOverride2']);
				$RewardFactionValueIdOverride3 = mysqli_real_escape_string($conn, $_POST['RewardFactionValueIdOverride3']);
				$RewardFactionValueIdOverride4 = mysqli_real_escape_string($conn, $_POST['RewardFactionValueIdOverride4']);
				$RewardFactionValueIdOverride5 = mysqli_real_escape_string($conn, $_POST['RewardFactionValueIdOverride5']);
				$PrevQuestId = mysqli_real_escape_string($conn, $_POST['PrevQuestId']);
				$NextQuestId = mysqli_real_escape_string($conn, $_POST['NextQuestId']);
				$MaxLevel = mysqli_real_escape_string($conn, $_POST['MaxLevel']);
				$SourceSpellId = mysqli_real_escape_string($conn, $_POST['SourceSpellId']);
				$ExclusiveGroup = mysqli_real_escape_string($conn, $_POST['ExclusiveGroup']);
				$RequiredSkillId = mysqli_real_escape_string($conn, $_POST['RequiredSkillId']);
				$RequiredSkillPoints = mysqli_real_escape_string($conn, $_POST['RequiredSkillPoints']);
				$RequiredMinRepFaction = mysqli_real_escape_string($conn, $_POST['RequiredMinRepFaction']);
				$RequiredMinRepValue = mysqli_real_escape_string($conn, $_POST['RequiredMinRepValue']);
				$RequiredMaxRepFaction = mysqli_real_escape_string($conn, $_POST['RequiredMaxRepFaction']);
				$RequiredMaxRepValue = mysqli_real_escape_string($conn, $_POST['RequiredMaxRepValue']);
				$RewardMailTemplateId = mysqli_real_escape_string($conn, $_POST['RewardMailTemplateId']);
				$RewardMailDelay = mysqli_real_escape_string($conn, $_POST['RewardMailDelay']);
				$OfferRewardText = mysqli_real_escape_string($conn, $_POST['OfferRewardText']);
				$OfferRewardEmote1 = mysqli_real_escape_string($conn, $_POST['OfferRewardEmote1']);
				$OfferRewardEmote2 = mysqli_real_escape_string($conn, $_POST['OfferRewardEmote2']);
				$OfferRewardEmote3 = mysqli_real_escape_string($conn, $_POST['OfferRewardEmote3']);
				$OfferRewardEmote4 = mysqli_real_escape_string($conn, $_POST['OfferRewardEmote4']);
				$OfferRewardEmoteDelay1 = mysqli_real_escape_string($conn, $_POST['OfferRewardEmoteDelay1']);
				$OfferRewardEmoteDelay2 = mysqli_real_escape_string($conn, $_POST['OfferRewardEmoteDelay2']);
				$OfferRewardEmoteDelay3 = mysqli_real_escape_string($conn, $_POST['OfferRewardEmoteDelay3']);
				$OfferRewardEmoteDelay4 = mysqli_real_escape_string($conn, $_POST['OfferRewardEmoteDelay4']);
				$RequestItemsText = mysqli_real_escape_string($conn, $_POST['RequestItemsText']);
				$EmoteOnComplete = mysqli_real_escape_string($conn, $_POST['EmoteOnComplete']);
				$EmoteOnIncomplete = mysqli_real_escape_string($conn, $_POST['EmoteOnIncomplete']);
				$specialflags = mysqli_real_escape_string($conn, $_POST['specialflags']);
				$SourceItemCount = mysqli_real_escape_string($conn, $_POST['SourceItemCount']);
				$NextQuestIdChain = mysqli_real_escape_string($conn, $_POST['NextQuestIdChain']);




// Update query
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
				SpecialFlags='$specialflags',
				SourceItemCount='$SourceItemCount',
				NextQuestIdChain='$NextQuestIdChain'
WHERE Id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
	 
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Quest</title>
</head>
<body>
    <!-- Existing form and content -->

    <!-- Add the "Back to Create" button -->
    <form action="create.php" method="post">
        <input type="hidden" name="ip" value="<?php echo $ip; ?>">
        <input type="hidden" name="port" value="<?php echo $port; ?>">
        <input type="hidden" name="user" value="<?php echo $user; ?>">
        <input type="hidden" name="password" value="<?php echo $password; ?>">
		<input type="hidden" name="dbname" value="<?php echo $dbname; ?>">
        <button type="submit">Back to Create</button>
    </form>
</body>
</html>
