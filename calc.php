<!DOCTYPE html>
<html>
<head>
    <title>Calculate Quest Fields</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .columns {
            display: flex;
            justify-content: space-between;
        }
        .column {
            flex: 1;
            padding: 10px;
            border-right: 1px solid #ccc;
        }
        .column:last-child {
            border-right: none;
        }
        .group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .group input[type="checkbox"] {
            margin-right: 10px;
        }
        .result {
            font-weight: bold;
            font-size: 1.2em;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Calculate Quest Fields</h1>

    <form id="calcForm">
        <div class="columns">
            <div class="column">
                <div class="group">
                    <label>Required Races</label>
                    <input type="checkbox" name="races[]" value="0">All races<br>
                    <input type="checkbox" name="races[]" value="1">Human<br>
                    <input type="checkbox" name="races[]" value="2">Orc<br>
                    <input type="checkbox" name="races[]" value="4">Dwarf<br>
                    <input type="checkbox" name="races[]" value="8">Night Elf<br>
                    <input type="checkbox" name="races[]" value="16">Undead<br>
                    <input type="checkbox" name="races[]" value="32">Tauren<br>
                    <input type="checkbox" name="races[]" value="64">Gnome<br>
                    <input type="checkbox" name="races[]" value="128">Troll<br>
                    <input type="checkbox" name="races[]" value="256">Goblin<br>
					<input type="checkbox" name="races[]" value="2097152">Worgen<br>
                </div>
            </div>
            <div class="column">
                <div class="group">
                    <label>Required Classes</label>
                    <input type="checkbox" name="classes[]" value="0">All classes<br>
                    <input type="checkbox" name="classes[]" value="1">Warrior<br>
                    <input type="checkbox" name="classes[]" value="2">Paladin<br>
                    <input type="checkbox" name="classes[]" value="4">Hunter<br>
                    <input type="checkbox" name="classes[]" value="8">Rogue<br>
                    <input type="checkbox" name="classes[]" value="16">Priest<br>
                    <input type="checkbox" name="classes[]" value="32">Death Knight<br>
                    <input type="checkbox" name="classes[]" value="64">Shaman<br>
                    <input type="checkbox" name="classes[]" value="128">Mage<br>
                    <input type="checkbox" name="classes[]" value="256">Warlock<br>
                    <input type="checkbox" name="classes[]" value="1024">Druid<br>
                </div>
            </div>
			<div class="column">
                <div class="group">
                    <label>Specical Flags</label>
                    <input type="checkbox" name="sflags[]" value="1">Makes the quest repeatable<br>
                    <input type="checkbox" name="sflags[]" value="2">Makes the quest only completable by some external event<br>
                    <input type="checkbox" name="sflags[]" value="4">Make quest auto-accept (only quests in the starter area need this flag)<br>
                    <input type="checkbox" name="sflags[]" value="8">Only used for Dungeon Finder quests<br>
                    <input type="checkbox" name="sflags[]" value="16">Makes the quest monthly<br>
                    <input type="checkbox" name="sflags[]" value="32">The quest requires RequiredOrNpcGo killcredit (a spell cast), but NOT an actual NPC kill<br>
                    <input type="checkbox" name="sflags[]" value="64">Makes quest not share rewarded reputation with other allied factions<br>
                    <input type="checkbox" name="sflags[]" value="128">Allows quest to fail in Player::FailQuest() independant of its current state, e.g. relevant for timed quests that are completed right from the beginning.<br>
				</div>
			</div>
            <div class="column">
                <div class="group">
                    <label>Flags</label>
                    <input type="checkbox" name="flags[]" value="1">Stay Alive<br>
                    <input type="checkbox" name="flags[]" value="2">Party Accept<br>
                    <input type="checkbox" name="flags[]" value="4">Exploration<br>
                    <input type="checkbox" name="flags[]" value="8">Sharable<br>
                    <input type="checkbox" name="flags[]" value="16">Has Condition<br>
                    <input type="checkbox" name="flags[]" value="32">Hide Reward POI<br>
                    <input type="checkbox" name="flags[]" value="64">Raid<br>
                    <input type="checkbox" name="flags[]" value="128">TBC Expansion<br>
                    <input type="checkbox" name="flags[]" value="256">No Money from XP<br>
                    <input type="checkbox" name="flags[]" value="512">Hidden Rewards<br>
                    <input type="checkbox" name="flags[]" value="1024">Tracking<br>
                    <input type="checkbox" name="flags[]" value="2048">Deprecate Reputation<br>
                    <input type="checkbox" name="flags[]" value="4096">Daily<br>
                    <input type="checkbox" name="flags[]" value="8192">Flags PVP<br>
                    <input type="checkbox" name="flags[]" value="16384">Unavailable<br>
                    <input type="checkbox" name="flags[]" value="32768">Weekly<br>
                    <input type="checkbox" name="flags[]" value="65536">Autocomplete<br>
                    <input type="checkbox" name="flags[]" value="131072">Display item in tracker<br>
                    <input type="checkbox" name="flags[]" value="262144">Objective Text<br>
                    <input type="checkbox" name="flags[]" value="524288">Auto accept
                </div>
            </div>
        </div>

        <button type="button" onclick="calculate()">Calculate</button>
    </form>

    <div class="result" id="result"></div>
</div>

<script>
    function calculate() {
        const form = document.getElementById('calcForm');
        let races = Array.from(form['races[]']).filter(cb => cb.checked).map(cb => parseInt(cb.value));
        let classes = Array.from(form['classes[]']).filter(cb => cb.checked).map(cb => parseInt(cb.value));
        let flags = Array.from(form['flags[]']).filter(cb => cb.checked).map(cb => parseInt(cb.value));
        let sflags = Array.from(form['sflags[]']).filter(cb => cb.checked).map(cb => parseInt(cb.value));

        const sumRaces = races.reduce((a, b) => a + b, 0);
        const sumClasses = classes.reduce((a, b) => a + b, 0);
        const sumFlags = flags.reduce((a, b) => a + b, 0);
        const sumSflags = sflags.reduce((a, b) => a + b, 0);

        document.getElementById('result').innerText = `Required Races: ${sumRaces}\nRequired Classes: ${sumClasses}\nFlags: ${sumFlags}\nSpecial Flags: ${sumSflags}`;
    }
</script>

</body>
</html>
