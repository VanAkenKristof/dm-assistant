<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dungeon Master Assistant</title>

    <link rel="stylesheet" href="/css/charactersheet.css">
</head>
<body>

<form class="charsheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <header>
        <section class="charname">
            <label for="charname">Character Name</label><input name="charname" placeholder="Thoradin Fireforge" value="{{ $character->name }}"/>
        </section>
        <section class="misc">
            <ul>
                <li>
                    <label for="classlevel">Class & Level</label><input name="classlevel" placeholder="Paladin 2" value="{{ $character->class . " " . $character->level }}"/>
                </li>
                <li>
                    <label for="background">Background</label><input name="background" placeholder="Acolyte" value="{{ $character->background }}"/>
                </li>
                <li>
                    <label for="playername">Player Name</label><input name="playername" placeholder="Player McPlayerface" value="{{ $character->player_name }}">
                </li>
                <li>
                    <label for="race">Race</label><input name="race" placeholder="Half-elf" value="{{ $character->race }}"/>
                </li>
                <li>
                    <label for="alignment">Alignment</label><input name="alignment" placeholder="Lawful Good" value="{{ $character->alignment }}"/>
                </li>
                <li>
                    <label for="experiencepoints">Experience Points</label><input name="experiencepoints" placeholder="3240" value="{{ $character->experience }}"/>
                </li>
            </ul>
        </section>
    </header>
    <main>
        <section>
            <section class="attributes">
                <div class="scores">
                    <ul>
                        <li>
                            <div class="score">
                                <label for="Strengthscore">Strength</label><input name="Strengthscore" placeholder="10" value="{{ $character->strength }}"/>
                            </div>
                            <div class="modifier">
                                <input name="Strengthmod" placeholder="+0" value="{{ $character->getModWithSymbol('strength') }}"/>
                            </div>
                        </li>
                        <li>
                            <div class="score">
                                <label for="Dexterityscore">Dexterity</label><input name="Dexterityscore" placeholder="10"  value="{{ $character->dexterity }}"/>
                            </div>
                            <div class="modifier">
                                <input name="Dexteritymod" placeholder="+0" value="{{ $character->getModWithSymbol('dexterity') }}"/>
                            </div>
                        </li>
                        <li>
                            <div class="score">
                                <label for="Constitutionscore">Constitution</label><input name="Constitutionscore" placeholder="10"  value="{{ $character->constitution }}"/>
                            </div>
                            <div class="modifier">
                                <input name="Constitutionmod" placeholder="+0" value="{{ $character->getModWithSymbol('constitution') }}"/>
                            </div>
                        </li>
                        <li>
                            <div class="score">
                                <label for="Wisdomscore">Wisdom</label><input name="Wisdomscore" placeholder="10"  value="{{ $character->wisdom }}"/>
                            </div>
                            <div class="modifier">
                                <input name="Wisdommod" placeholder="+0" value="{{ $character->getModWithSymbol('wisdom') }}"/>
                            </div>
                        </li>
                        <li>
                            <div class="score">
                                <label for="Intelligencescore">Intelligence</label><input name="Intelligencescore" placeholder="10"  value="{{ $character->intelligence }}"/>
                            </div>
                            <div class="modifier">
                                <input name="Intelligencemod" placeholder="+0" value="{{ $character->getModWithSymbol('intelligence') }}"/>
                            </div>
                        </li>
                        <li>
                            <div class="score">
                                <label for="Charismascore">Charisma</label><input name="Charismascore" placeholder="10"  value="{{ $character->charisma }}"/>
                            </div>
                            <div class="modifier">
                                <input name="Charismamod" placeholder="+0" value="{{ $character->getModWithSymbol('charisma') }}"/>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="attr-applications">
                    <div class="inspiration box">
                        <div class="label-container">
                            <label for="inspiration">Inspiration</label>
                        </div>
                        <input name="inspiration" type="checkbox" />
                    </div>
                    <div class="proficiencybonus box">
                        <div class="label-container">
                            <label for="proficiencybonus">Proficiency Bonus</label>
                        </div>
                        <input name="proficiencybonus" placeholder="2" value="{{ $character->getProficiency() }}"/>
                    </div>
                    <div class="saves list-section box">
                        <ul>
                            <li>
                                <label for="Strength-save">Strength</label><input name="Strength-save" placeholder="+0" type="text" value="{{ $character->getModSavingThrowWithSymbol("strength") }}"/><input name="Strength-save-prof" type="checkbox" @if($character->strength_prof) checked @endif/>
                            </li>
                            <li>
                                <label for="Dexterity-save">Dexterity</label><input name="Dexterity-save" placeholder="+0" type="text"  value="{{ $character->getModSavingThrowWithSymbol("dexterity") }}"/><input name="Dexterity-save-prof" type="checkbox" @if($character->dexterity_prof) checked @endif/>
                            </li>
                            <li>
                                <label for="Constitution-save">Constitution</label><input name="Constitution-save" placeholder="+0" type="text" value="{{ $character->getModSavingThrowWithSymbol("constitution") }}"/><input name="Constitution-save-prof" type="checkbox" @if($character->constitution_prof) checked @endif/>
                            </li>
                            <li>
                                <label for="Wisdom-save">Wisdom</label><input name="Wisdom-save" placeholder="+0" type="text" value="{{ $character->getModSavingThrowWithSymbol("wisdom") }}"/><input name="Wisdom-save-prof" type="checkbox" @if($character->wisdom_prof) checked @endif/>
                            </li>
                            <li>
                                <label for="Intelligence-save">Intelligence</label><input name="Intelligence-save" placeholder="+0" type="text" value="{{ $character->getModSavingThrowWithSymbol("intelligence") }}"/><input name="Intelligence-save-prof" type="checkbox" @if($character->intelligence_prof) checked @endif/>
                            </li>
                            <li>
                                <label for="Charisma-save">Charisma</label><input name="Charisma-save" placeholder="+0" type="text" value="{{ $character->getModSavingThrowWithSymbol("charisma") }}"/><input name="Charisma-save-prof" type="checkbox" @if($character->charisma_prof) checked @endif/>
                            </li>
                        </ul>
                        <div class="label">
                            Saving Throws
                        </div>
                    </div>
                    <div class="skills list-section box">
                        <ul>
                            <li>
                                <label for="Acrobatics">Acrobatics <span class="skill">(Dex)</span></label><input name="Acrobatics" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("acrobatics", "dexterity") }}"/><input name="Acrobatics-prof" type="checkbox" @if("prof" == $character->acrobatics || "expertise" == $character->acrobatics) checked @endif/>
                            </li>
                            <li>
                                <label for="Animal Handling">Animal Handling <span class="skill">(Wis)</span></label><input name="Animal Handling" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("animal_handling", "wisdom") }}"/><input name="Animal Handling-prof" type="checkbox" @if("prof" == $character->animal_handling || "expertise" == $character->animal_handling) checked @endif/>
                            </li>
                            <li>
                                <label for="Arcana">Arcana <span class="skill">(Int)</span></label><input name="Arcana" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("arcana", "intelligence") }}"/><input name="Arcana-prof" type="checkbox" @if("prof" == $character->arcana || "expertise" == $character->arcana) checked @endif/>
                            </li>
                            <li>
                                <label for="Athletics">Athletics <span class="skill">(Str)</span></label><input name="Athletics" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("athletics", "strength") }}"/><input name="Athletics-prof" type="checkbox" @if("prof" == $character->athletics || "expertise" == $character->athletics) checked @endif/>
                            </li>
                            <li>
                                <label for="Deception">Deception <span class="skill">(Cha)</span></label><input name="Deception" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("deception", "charisma") }}"/><input name="Deception-prof" type="checkbox" @if("prof" == $character->deception || "expertise" == $character->deception) checked @endif/>
                            </li>
                            <li>
                                <label for="History">History <span class="skill">(Int)</span></label><input name="History" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("history", "intelligence") }}"/><input name="History-prof" type="checkbox" @if("prof" == $character->history || "expertise" == $character->history) checked @endif/>
                            </li>
                            <li>
                                <label for="Insight">Insight <span class="skill">(Wis)</span></label><input name="Insight" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("insight", "wisdom") }}"/><input name="Insight-prof" type="checkbox" @if("prof" == $character->insight || "expertise" == $character->insight) checked @endif/>
                            </li>
                            <li>
                                <label for="Intimidation">Intimidation <span class="skill">(Cha)</span></label><input name="Intimidation" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("intimidation", "charisma") }}"/><input name="Intimidation-prof" type="checkbox" @if("prof" == $character->intimidation || "expertise" == $character->intimidation) checked @endif/>
                            </li>
                            <li>
                                <label for="Investigation">Investigation <span class="skill">(Int)</span></label><input name="Investigation" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("investigation", "intelligence") }}"/><input name="Investigation-prof" type="checkbox" @if("prof" == $character->investigation || "expertise" == $character->investigation) checked @endif/>
                            </li>
                            <li>
                                <label for="Medicine">Medicine <span class="skill">(Wis)</span></label><input name="Medicine" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("medicine", "wisdom") }}"/><input name="Medicine-prof" type="checkbox" @if("prof" == $character->medicine || "expertise" == $character->medicine) checked @endif/>
                            </li>
                            <li>
                                <label for="Nature">Nature <span class="skill">(Int)</span></label><input name="Nature" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("nature", "intelligence") }}"/><input name="Nature-prof" type="checkbox" @if("prof" == $character->nature || "expertise" == $character->nature) checked @endif/>
                            </li>
                            <li>
                                <label for="Perception">Perception <span class="skill">(Wis)</span></label><input name="Perception" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("perception", "wisdom") }}"/><input name="Perception-prof" type="checkbox" @if("prof" == $character->perception || "expertise" == $character->perception) checked @endif/>
                            </li>
                            <li>
                                <label for="Performance">Performance <span class="skill">(Cha)</span></label><input name="Performance" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("performance", "charisma") }}"/><input name="Performance-prof" type="checkbox" @if("prof" == $character->performance || "expertise" == $character->performance) checked @endif/>
                            </li>
                            <li>
                                <label for="Persuasion">Persuasion <span class="skill">(Cha)</span></label><input name="Persuasion" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("persuasion", "charisma") }}"/><input name="Persuasion-prof" type="checkbox" @if("prof" == $character->persuasion || "expertise" == $character->persuasion) checked @endif/>
                            </li>
                            <li>
                                <label for="Religion">Religion <span class="skill">(Int)</span></label><input name="Religion" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("religion", "intelligence") }}"/><input name="Religion-prof" type="checkbox" @if("prof" == $character->religion || "expertise" == $character->religion) checked @endif/>
                            </li>
                            <li>
                                <label for="Sleight of Hand">Sleight of Hand <span class="skill">(Dex)</span></label><input name="Sleight of Hand" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("sleight_of_hand", "dexterity") }}"/><input name="Sleight of Hand-prof" type="checkbox" @if("prof" == $character->sleight_of_hand || "expertise" == $character->sleight_of_hand) checked @endif/>
                            </li>
                            <li>
                                <label for="Stealth">Stealth <span class="skill">(Dex)</span></label><input name="Stealth" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("stealth", "dexterity") }}"/><input name="Stealth-prof" type="checkbox" @if("prof" == $character->stealth || "expertise" == $character->stealth) checked @endif/>
                            </li>
                            <li>
                                <label for="Survival">Survival <span class="skill">(Wis)</span></label><input name="Survival" placeholder="+0" type="text" value="{{ $character->getModSkillWithSymbol("survival", "wisdom") }}"/><input name="Survival-prof" type="checkbox" @if("prof" == $character->survival || "expertise" == $character->survival) checked @endif/>
                            </li>
                        </ul>
                        <div class="label">
                            Skills
                        </div>
                    </div>
                </div>
            </section>
            <div class="passive-perception box">
                <div class="label-container">
                    <label for="passiveperception">Passive Wisdom (Perception)</label>
                </div>
                <input name="passiveperception" placeholder="10" />
            </div>
            <div class="otherprofs box textblock">
                <label for="otherprofs">Other Proficiencies and Languages</label><textarea name="otherprofs">{{ $character->other }}</textarea>
            </div>
        </section>
        <section>
            <section class="combat">
                <div class="armorclass">
                    <div>
                        <label for="ac">Armor Class</label><input name="ac" placeholder="10" type="text" value="{{ $character->ac }}"/>
                    </div>
                </div>
                <div class="initiative">
                    <div>
                        <label for="initiative">Initiative</label><input name="initiative" placeholder="+0" type="text" value="{{ $character->getModWithSymbol("dexterity") }}"/>
                    </div>
                </div>
                <div class="speed">
                    <div>
                        <label for="speed">Speed</label><input name="speed" placeholder="30" type="text" value="{{ $character->speed }}"/>
                    </div>
                </div>
                <div class="hp">
                    <div class="regular">
                        <div class="max">
                            <label for="maxhp">Hit Point Maximum</label><input name="maxhp" placeholder="10" type="text" value="{{ $character->max_hp }}"/>
                        </div>
                        <div class="current">
                            <label for="currenthp">Current Hit Points</label><input name="currenthp" type="text" value="{{ $character->current_hp }}"/>
                        </div>
                    </div>
                    <div class="temporary">
                        <label for="temphp">Temporary Hit Points</label><input name="temphp" type="text" value="{{ $character->temp_hp }}"/>
                    </div>
                </div>
                <div class="hitdice">
                    <div>
                        <div class="total">
                            <label for="totalhd">Total</label><input name="totalhd" placeholder="2d10" type="text" value="2d10"/>
                        </div>
                        <div class="remaining">
                            <label for="remaininghd">Hit Dice</label><input name="remaininghd" type="text" value="2"/>
                        </div>
                    </div>
                </div>
                <div class="deathsaves">
                    <div>
                        <div class="label">
                            <label>Death Saves</label>
                        </div>
                        <div class="marks">
                            <div class="deathsuccesses">
                                <label>Successes</label>
                                <div class="bubbles">
                                    <input name="deathsuccess1" type="checkbox" />
                                    <input name="deathsuccess2" type="checkbox" />
                                    <input name="deathsuccess3" type="checkbox" />
                                </div>
                            </div>
                            <div class="deathfails">
                                <label>Failures</label>
                                <div class="bubbles">
                                    <input name="deathfail1" type="checkbox" />
                                    <input name="deathfail2" type="checkbox" />
                                    <input name="deathfail3" type="checkbox" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="attacksandspellcasting">
                <div>
                    <label>Attacks & Spellcasting</label>
                    <table>
                        <thead>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Atk Bonus
                            </th>
                            <th>
                                Damage/Type
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <input name="atkname1" type="text" />
                            </td>
                            <td>
                                <input name="atkbonus1" type="text" />
                            </td>
                            <td>
                                <input name="atkdamage1" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input name="atkname2" type="text" />
                            </td>
                            <td>
                                <input name="atkbonus2" type="text" />
                            </td>
                            <td>
                                <input name="atkdamage2" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input name="atkname3" type="text" />
                            </td>
                            <td>
                                <input name="atkbonus3" type="text" />
                            </td>
                            <td>
                                <input name="atkdamage3" type="text" />
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <textarea></textarea>
                </div>
            </section>
            <section class="equipment">
                <div>
                    <label>Equipment</label>
                    <div class="money">
                        <ul>
                            <li>
                                <label for="cp">cp</label><input name="cp" value="{{ $character->cp }}"/>
                            </li>
                            <li>
                                <label for="sp">sp</label><input name="sp" value="{{ $character->sp }}"/>
                            </li>
                            <li>
                                <label for="ep">ep</label><input name="ep" value="{{ $character->ep }}"/>
                            </li>
                            <li>
                                <label for="gp">gp</label><input name="gp" value="{{ $character->gp }}"/>
                            </li>
                            <li>
                                <label for="pp">pp</label><input name="pp" value="{{ $character->pp }}"/>
                            </li>
                        </ul>
                    </div>
                    <textarea placeholder="Equipment list here">{{ $character->equipment }}</textarea>
                </div>
            </section>
        </section>
        <section>
            <section class="flavor">
                <div class="personality">
                    <label for="personality">Personality</label><textarea name="personality">{{ $character->personality }}</textarea>
                </div>
                <div class="ideals">
                    <label for="ideals">Ideals</label><textarea name="ideals">{{ $character->ideals }}</textarea>
                </div>
                <div class="bonds">
                    <label for="bonds">Bonds</label><textarea name="bonds">{{ $character->bonds }}</textarea>
                </div>
                <div class="flaws">
                    <label for="flaws">Flaws</label><textarea name="flaws">{{ $character->flaws }}</textarea>
                </div>
            </section>
            <section class="features">
                <div>
                    <label for="features">Features & Traits</label><textarea name="features">{{ $character->features }}</textarea>
                </div>
            </section>
        </section>
    </main>
</form>

<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.6.1/annyang.min.js"></script>
<script src="/js/text2num.js"></script>
<script src="/js/num2text.js"></script>
<script src="/js/numberArray.js"></script>
<script src="/js/assistant.js"></script>
</body>
</html>