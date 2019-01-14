<?php

use Illuminate\Database\Seeder;

class CharactersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = "-----------------------------
Human (Variant)
-----------------------------
  • Ability Score Increase
    - Strength +1
    - Charisma +1
  • Languages
    - Common
    - Celestial
  • Feat
    - Heavy Armor Master
-----------------------------
Paladin
-----------------------------
  • Divine Sense  | ooooo
  • Lay on Hands |     /10
  • Fighting Style
    - Defense
  • Spellcasting
  • Divine Smite";

        $other = "Armor
  • Light Armor
  • Medium Armor
  • Heavy Armor
  • Shields

Weapons
  • Simple
  • Martial

Languages
  • Common
  • Orc
  • Celestial";

        $equipment = "• Chain Mail
• Longsword
• Shield
• MacBook Pro";

        $character = new \App\Character();

        $character->name = "James";
        $character->player_name = "Sam Serrien";
        $character->level = 2;
        $character->class = "Paladin";
        $character->race = "Human";
        $character->background = "Scholar";
        $character->alignment = "Neutral Evil";
        $character->experience = 900;

        $character->strength = 16;
        $character->dexterity = 8;
        $character->constitution = 14;
        $character->wisdom = 10;
        $character->intelligence = 8;
        $character->charisma = 16;

        $character->strength_prof = false;
        $character->dexterity_prof = false;
        $character->constitution_prof = false;
        $character->wisdom_prof = true;
        $character->intelligence_prof = false;
        $character->charisma_prof = true;

        $character->acrobatics = "none";
        $character->animal_handling = "none";
        $character->arcana = "none";
        $character->athletics = "prof";
        $character->deception = "expertise";
        $character->history = "none";
        $character->insight = "none";
        $character->intimidation = "prof";
        $character->investigation = "none";
        $character->medicine = "prof";
        $character->nature = "none";
        $character->perception = "none";
        $character->performance = "none";
        $character->persuasion = "prof";
        $character->religion = "none";
        $character->sleight_of_hand = "none";
        $character->stealth = "none";
        $character->survival = "none";

        $character->ac = 18;
        $character->initiative = -1;
        $character->speed = 30;

        $character->max_hp = 20;
        $character->current_hp = 15;
        $character->temp_hp = 0;

        $character->personality = "I use polysyllabic words that convey the impression of great erudition.";
        $character->ideals = "Knowledge is the path to power and domination.";
        $character->bonds = "I sold my soul for knowledge. I hope to do great deeds and win it back.";
        $character->flaws = "Most people scream and run when they see a demon. I stop and take notes on its anatomy.";

        $character->features = $features;
        $character->other = $other;

        $character->cp = 23;
        $character->sp = 3;
        $character->ep = 0;
        $character->gp = 22;
        $character->pp = 2;

        $character->equipment = $equipment;

        $character->save();
    }
}
