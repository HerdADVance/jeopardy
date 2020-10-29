<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
        	[
        		'category_id' => 1,
        		'clue' => "Brasky's poop may be used as currency in Argentina, but that country's official currency is this",
        		'answer' => "Peso",
        		'order' => 1
        	],
        	[
        		'category_id' => 1,
        		'clue' => "Brasky was once ranked 18th in the AP college football poll. This team finished the 2019 season there - one spot ahead of a team that famously upset them in 2007",
        		'answer' => "Michigan",
        		'order' => 2
        	],
        	[
        		'category_id' => 1,
        		'clue' => "Brasky once scissor kicked Angela Lansbury, the star of this TV show that lasted from 1984 to 1996",
        		'answer' => "Murder She Wrote",
        		'order' => 3
        	],
        	[
        		'category_id' => 1,
        		'clue' => "Rumor has it this man who created Star Trek got the idea for the show from listening to Brasky talk in his sleep",
        		'answer' => "Gene Roddenberry",
        		'order' => 4
        	],
        	[
        		'category_id' => 1,
        		'clue' => "They say Brasky was a 10 foot monster who could palm a medicine ball, but within 3 inches, Robert Wadlow of Illinois was the world's tallest confirmed human at this height",
        		'answer' => "8'11\"",
        		'order' => 5
        	],
            [
                'category_id' => 3,
                'clue' => "Boston Bruins, Detroit Red Wings, Montreal Canadiens, New York Rangers, Toronto Maple Leafs, _____",
                'answer' => "Chicago Blackhawks (NHL Original Six)",
                'order' => 1
            ],
            [
                'category_id' => 3,
                'clue' => "Spain, Mexico, Republic of Texas, United States, Confederate States of America, _____",
                'answer' => "France (Six Flags of Texas)",
                'order' => 2
            ],
            [
                'category_id' => 3,
                'clue' => "George Clooney, Brad Pitt, Matt Damon, Don Cheadle, Elliott Gould, Casey Affleck, Scott Caan, Eddie Jemison, Carl Reiner, Shaobo Qin, _____ ",
                'answer' => "Bernie Mac (Ocean's Eleven Crew Actors)",
                'order' => 3
            ],
            [
                'category_id' => 3,
                'clue' => "Helium, Neon, Argon, Krypton, Xenon, Oganesson (tentatively), _____",
                'answer' => "Radon (Noble Gases)",
                'order' => 4
            ],
            [
                'category_id' => 3,
                'clue' => "The North, The Stormlands, The Reach, The Westerlands, The Iron Islands, Dorne, _____",
                'answer' => "The Vale (Seven Kingdoms of Westeros)",
                'order' => 5
            ],
            [
                'category_id' => 2,
                'clue' => "Original US Colonies - Wives of Henry VIII",
                'answer' => "13 - 6 = 7",
                'order' => 1
            ],
            [
                'category_id' => 2,
                'clue' => "Woodrow Wilson's Points * George H.W. Bush's Points of Light",
                'answer' => "14 * 1,000 = 14,000",
                'order' => 2
            ],
            [
                'category_id' => 2,
                'clue' => "(Year of Operation Barbarossa - Year of Pearl Harbor Attack) * Year of D-Day Landings",
                'answer' => "(1941 - 1941) * 1944 = 0",
                'order' => 3
            ],
            [
                'category_id' => 2,
                'clue' => "Year Columbus left on original voyage * Number of ships he took with him",
                'answer' => "1492 * 3 = 4476",
                'order' => 4
            ],
            [
                'category_id' => 2,
                'clue' => "Martin Luther's theses - Pillars of Islam - Constitutional Amendment that repealed Prohibition",
                'answer' => "95 - 5 - 21 = 69",
                'order' => 5
            ],
            [
                'category_id' => 4,
                'clue' => "Pepto Bismol is primarily used to help relieve these types of symptoms",
                'answer' => "Gastrointestinal",
                'order' => 1
            ],
            [
                'category_id' => 4,
                'clue' => "This railroad was completed at Promontory Summit, Utah in 1869",
                'answer' => "Transcontinental",
                'order' => 2
            ],
            [
                'category_id' => 4,
                'clue' => "The degree to which you're able to use both hands",
                'answer' => "Ambidextrousness",
                'order' => 3
            ],
            [
                'category_id' => 4,
                'clue' => "With the Edict of Milan in 313 AD, Emperor Constantine is credited with taking the Roman Empire through this religious transformation",
                'answer' => "Christianization",
                'order' => 4
            ],
            [
                'category_id' => 4,
                'clue' => "Glaucoma and cataracts are examples of these types of problems",
                'answer' => "Ophthalmological",
                'order' => 5
            ],
            [
                'category_id' => 5,
                'clue' => "This comedian and actress starred in a reality series alongside her daughter Melissa from 2011-2014",
                'answer' => "Joan Rivers",
                'order' => 1
            ],
            [
                'category_id' => 5,
                'clue' => "This rocker dropped out of Harvard to record his band's 2nd album, Pinkerton, in 1996",
                'answer' => "Rivers Cuomo",
                'order' => 2
            ],
            [
                'category_id' => 5,
                'clue' => "The three rivers that come together in downtown Pittsburgh",
                'answer' => "Monongahela, Allegheny, Ohio",
                'order' => 3
            ],
            [
                'category_id' => 5,
                'clue' => "Philip Rivers threw for what is now the 2nd most passing touchdowns in ACC history while at NC State, sandwiched between these two Clemson QB's of the Dabo Swinney era",
                'answer' => "Tajh Boyd & Deshaun Watson",
                'order' => 4
            ],
            [
                'category_id' => 5,
                'clue' => "The longest river in North America begins in this state ",
                'answer' => "Montana (Missouri River)",
                'order' => 5
            ],
            [
                'category_id' => 6,
                'clue' => "Rickie Fowler",
                'answer' => "Oklahoma State",
                'order' => 1
            ],
            [
                'category_id' => 6,
                'clue' => "Andy Isabella",
                'answer' => "UMass",
                'order' => 2
            ],
            [
                'category_id' => 6,
                'clue' => "Sabrina Ionescu",
                'answer' => "Oregon",
                'order' => 3
            ],
            [
                'category_id' => 6,
                'clue' => "Travis Kelce",
                'answer' => "Cincinnati",
                'order' => 4
            ],
            [
                'category_id' => 6,
                'clue' => "Alex Caruso",
                'answer' => "Texas A&M",
                'order' => 5
            ],
            [
                'category_id' => 7,
                'clue' => "Edward Lodewijk van Halen, who died of throat cancer on October 6, was born in this European capital in 1955",
                'answer' => "Amsterdam",
                'order' => 1
            ],
            [
                'category_id' => 7,
                'clue' => "Before he was T'Challa, Chadwick Boseman, who died of colon cancer on August 28, played fictional Ohio State linebacker Vontae Mack in this 2014 Kevin Costner film",
                'answer' => "Draft Day",
                'order' => 2
            ],
            [
                'category_id' => 7,
                'clue' => "This Marshall grad, best known for playing Berta on Two and a Half Men, died of cardiac arrest on October 12",
                'answer' => "Conchata Ferrell",
                'order' => 3
            ],
            [
                'category_id' => 7,
                'clue' => "This West Virginian who died on February 24 at the age of 101 pioneered the use of computers at NASA and was portrayed by Taraji P. Henson in the Oscar-nominated 2016 film Hidden Figures",
                'answer' => "Katherine Johnson",
                'order' => 4
            ],
            [
                'category_id' => 7,
                'clue' => "This American country folk singer who won Grammys for his albums The Missing Years and Fair & Square died on April 7 from COVID",
                'answer' => "John Prine",
                'order' => 5
            ],
            [
                'category_id' => 8,
                'clue' => "This Serbian-American developed an alternating current induction motor and was a pioneer of the possibilities of wireless communication",
                'answer' => "Nikola Tesla",
                'order' => 1
            ],
            [
                'category_id' => 8,
                'clue' => "This psychologist's Hiearchy of Needs includes Physiological, Safety, Belongingness, Esteem, and Self-Actualization",
                'answer' => "Abraham Maslow",
                'order' => 2
            ],
            [
                'category_id' => 8,
                'clue' => "Of Bohr, Copernicus, Einstein, Faraday, Fermi, Mendelev, Nobel, Rontgen, and Rutherford: the one who doesn't have a chemical element named after him",
                'answer' => "Faraday",
                'order' => 3
            ],
            [
                'category_id' => 8,
                'clue' => "Two of the four moons in the Solar System larger than Earth's",
                'answer' => "Ganymede, Titan, Callisto, Io",
                'order' => 4
            ],
            [
                'category_id' => 8,
                'clue' => "This term has nothing to do with your sex drive, but it does measure the amount of energy that is reflected by a surface",
                'answer' => "Albedo",
                'order' => 5
            ],
            [
                'category_id' => 9,
                'clue' => "Nimptopsical, Buzzey, and Staggerish are synonyms for drunkenness in \"The Drinker's Dictionary\", written by this Pennsylvanian in 1737",
                'answer' => "Benjamin Franklin",
                'order' => 1
            ],
            [
                'category_id' => 9,
                'clue' => "This president was one of two to win 49 states in the Electoral College, but the only one to appear on Laugh-In",
                'answer' => "Richard Nixon",
                'order' => 2
            ],
            [
                'category_id' => 9,
                'clue' => "This NFC East quarterback was the first NFL player to say \"I'm going to Disneyland\" after winning the Super Bowl",
                'answer' => "Phil Simms",
                'order' => 3
            ],
            [
                'category_id' => 9,
                'clue' => "Artist Grant Wood used his dentist as a model for the farmer in this famous painting",
                'answer' => "American Gothic",
                'order' => 4
            ],
            [
                'category_id' => 9,
                'clue' => "Alan Shepherd used this club to hit a golf ball on the moon",
                'answer' => "6 Iron",
                'order' => 5
            ],
            [
                'category_id' => 10,
                'clue' => "The 1876 Electoral College, which Samuel Tilden eventually lost 185-184 to this president, had to be settled by a compromise that ended Reconstruction and allowed Southern states to disenfranchise black voters",
                'answer' => "Rutherford B. Hayes",
                'order' => 1
            ],
            [
                'category_id' => 10,
                'clue' => "This state was allocated 47 electoral votes as recently as 1948 but now only receives 29",
                'answer' => "New York",
                'order' => 2
            ],
            [
                'category_id' => 10,
                'clue' => "This president only won 8 electoral votes and finished a distant 3rd in his 1912 re-election bid, mostly because Theodore Roosevelt split the vote by running as the candidate of the Progressive Party",
                'answer' => "William Howard Taft",
                'order' => 3
            ],
            [
                'category_id' => 10,
                'clue' => "These two states are the only ones whose Electoral College votes can be split in situations that don't involve a faithless elector",
                'answer' => "Maine & Nebraska",
                'order' => 4
            ],
            [
                'category_id' => 10,
                'clue' => "Other than Hillary Clinton, she is the only woman in history to receive any Electoral College votes, or the year in which she did",
                'answer' => "Faith Spotted Eagle (2016)",
                'order' => 5
            ],
            [
                'category_id' => 11,
                'clue' => "This 2006 Matthew McConaughey and Matthew Fox movie is remade as a sequel about the star of 2002's 8 Mile",
                'answer' => "We Are Marshall Mathers",
                'order' => 1
            ],
            [
                'category_id' => 11,
                'clue' => "The original lead singer of Van Halen gets adopted by a wealthy family that is often the subject of antisemitic conspiracy theories",
                'answer' => "David Lee Rothschild",
                'order' => 2
            ],
            [
                'category_id' => 11,
                'clue' => "This English soccer club known as the Red Devils gets renamed after moving to Dubai",
                'answer' => "Manchester United Arab Emirates",
                'order' => 3
            ],
            [
                'category_id' => 11,
                'clue' => "Turns out this star of New Girl was the inspiration for the iconic perfume fragrance launched in 1921",
                'answer' => "Zooey Deschanel No. 5",
                'order' => 4
            ],
            [
                'category_id' => 11,
                'clue' => "Clark Gable's iconic line from Gone With the Wind gets turned into a 1992 Geto Boys song featured in the movie Office Space",
                'answer' => "Frankly My Dear I Don't Give a Damn it Feels Good to be a Gangsta",
                'order' => 5
            ],
            [
                'category_id' => 12,
                'clue' => "Aroldis Chapman",
                'answer' => "Cuba",
                'order' => 1
            ],
            [
                'category_id' => 12,
                'clue' => "Hafthor Björnsson",
                'answer' => "Iceland",
                'order' => 2
            ],
            [
                'category_id' => 12,
                'clue' => "Abraham Ancer",
                'answer' => "Mexico",
                'order' => 3
            ],
            [
                'category_id' => 12,
                'clue' => "Giovanni Reyna",
                'answer' => "United States",
                'order' => 4
            ],
            [
                'category_id' => 12,
                'clue' => "OG Anunoby (one of two countries)",
                'answer' => "England/Nigeria",
                'order' => 5
            ],
            [
                'category_id' => 13,
                'clue' => "This country's flag is the only one in the world without red, white, or blue",
                'answer' => "Jamaica",
                'order' => 1
            ],

        ]);
    }
}
