<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Game;
use App\Models\GameAsset;
use App\Models\GamePackage;
use App\Models\PaymentMethod;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'accountant']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'support']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'guest']);

        // Games Seeder
        Game::create(['name' => 'Baccarat' , 'description' => "Baccarat is a card game played at casinos. There are three popular variants of the game: punto banco (or \"North American baccarat\"), baccarat chemin de fer (or \"chemmy\"), and baccarat banque (or à deux tableaux). In punto banco, each player's moves are forced by the cards the player is dealt. In baccarat chemin de fer and baccarat banque, by contrast, both players can make choices. The winning odds are in favour of the bank, with a house edge no lower than around 1 percent.", 'image' => 'baccarat.png', 'thumbnail' => 'baccarat.png', 'web_url' => 'https://www.baccarat.com/', 'android_url' => 'https://www.baccarat.com/', 'ios_url' => 'https://www.baccarat.com/', 'is_active' => true]);
        Game::create(['name' => 'Blackjack' , 'description' => "Blackjack, formerly also Black Jack and Vingt-Un, is the American member of a global family of banking games known as Twenty-One, whose relatives include the British game of Pontoon and the European game, Vingt-et-Un. It is a comparing card game between one or more players and a dealer, where each player in turn competes against the dealer. Players do not compete against each other. It is played with one or more decks of 52 cards, and is the most widely played casino banking game in the world.", 'image' => 'blackjack.png', 'thumbnail' => 'blackjack.png', 'web_url' => 'https://www.blackjack.com/', 'android_url' => 'https://www.blackjack.com/', 'ios_url' => 'https://www.blackjack.com/', 'is_active' => true]);
        Game::create(['name' => 'Roulette' , 'description' => "Roulette is a casino game named after the French word meaning little wheel. In the game, players may choose to place bets on either a single number, various groupings of numbers, the colors red or black, whether the number is odd or even, or if the numbers are high (19–36) or low (1–18).", 'image' => 'roulette.png', 'thumbnail' => 'roulette.png', 'web_url' => 'https://www.roulette.com/', 'android_url' => 'https://www.roulette.com/', 'ios_url' => 'https://www.roulette.com/', 'is_active' => true]);
        Game::create(['name' => 'Slots' , 'description' => "A slot machine (American English), known variously as a fruit machine (British English), puggy (Scottish English), the slots (Canadian English and American English), poker machine/pokies (Australian English and New Zealand English), fruities (British English) or slots (American English), is a gambling machine that creates a game of chance for its customers. Slot machines are also known pejoratively as one-armed bandits due to the large mechanical levers affixed to the sides of early mechanical machines and their ability to empty players' pockets and wallets as thieves would.", 'image' => 'slots.png', 'thumbnail' => 'slots.png', 'web_url' => 'https://www.slots.com/', 'android_url' => 'https://www.slots.com/', 'ios_url' => 'https://www.slots.com/', 'is_active' => true]);
        
        // Game Assets Seeder
        GameAsset::create(['game_id' => 1, 'name' => 'Baccarat Gold' , 'description' => "Baccarat is a card game played at casinos. There are three popular variants of the game: punto banco (or \"North American baccarat\"), baccarat chemin de fer (or \"chemmy\"), and baccarat banque (or à deux tableaux). In punto banco, each player's moves are forced by the cards the player is dealt. In baccarat chemin de fer and baccarat banque, by contrast, both players can make choices. The winning odds are in favour of the bank, with a house edge no lower than around 1 percent.", 'image' => 'baccarat.png', 'thumbnail' => 'baccarat.png', 'is_active' => true]);
        GameAsset::create(['game_id' => 1, 'name' => 'Baccarat Gems' , 'description' => "Baccarat is a card game played at casinos. There are three popular variants of the game: punto banco (or \"North American baccarat\"), baccarat chemin de fer (or \"chemmy\"), and baccarat banque (or à deux tableaux). In punto banco, each player's moves are forced by the cards the player is dealt. In baccarat chemin de fer and baccarat banque, by contrast, both players can make choices. The winning odds are in favour of the bank, with a house edge no lower than around 1 percent.", 'image' => 'baccarat.png', 'thumbnail' => 'baccarat.png', 'is_active' => true]);
        GameAsset::create(['game_id' => 1, 'name' => 'Baccarat Weapon' , 'description' => "Baccarat is a card game played at casinos. There are three popular variants of the game: punto banco (or \"North American baccarat\"), baccarat chemin de fer (or \"chemmy\"), and baccarat banque (or à deux tableaux). In punto banco, each player's moves are forced by the cards the player is dealt. In baccarat chemin de fer and baccarat banque, by contrast, both players can make choices. The winning odds are in favour of the bank, with a house edge no lower than around 1 percent.", 'image' => 'baccarat.png', 'thumbnail' => 'baccarat.png', 'is_active' => true]);

        GameAsset::create(['game_id' => 2, 'name' => 'Blackjack Gold' , 'description' => "Blackjack, formerly also Black Jack and Vingt-Un, is the American member of a global family of banking games known as Twenty-One, whose relatives include the British game of Pontoon and the European game, Vingt-et-Un. It is a comparing card game between one or more players and a dealer, where each player in turn competes against the dealer. Players do not compete against each other. It is played with one or more decks of 52 cards, and is the most widely played casino banking game in the world.", 'image' => 'blackjack.png', 'thumbnail' => 'blackjack.png', 'is_active' => true]);
        GameAsset::create(['game_id' => 2, 'name' => 'Blackjack Gems' , 'description' => "Blackjack, formerly also Black Jack and Vingt-Un, is the American member of a global family of banking games known as Twenty-One, whose relatives include the British game of Pontoon and the European game, Vingt-et-Un. It is a comparing card game between one or more players and a dealer, where each player in turn competes against the dealer. Players do not compete against each other. It is played with one or more decks of 52 cards, and is the most widely played casino banking game in the world.", 'image' => 'blackjack.png', 'thumbnail' => 'blackjack.png', 'is_active' => true]);
        GameAsset::create(['game_id' => 2, 'name' => 'Blackjack Weapon' , 'description' => "Blackjack, formerly also Black Jack and Vingt-Un, is the American member of a global family of banking games known as Twenty-One, whose relatives include the British game of Pontoon and the European game, Vingt-et-Un. It is a comparing card game between one or more players and a dealer, where each player in turn competes against the dealer. Players do not compete against each other. It is played with one or more decks of 52 cards, and is the most widely played casino banking game in the world.", 'image' => 'blackjack.png', 'thumbnail' => 'blackjack.png', 'is_active' => true]);

        GameAsset::create(['game_id' => 3, 'name' => 'Roulette Gold' , 'description' => "Roulette is a casino game named after the French word meaning little wheel. In the game, players may choose to place bets on either a single number, various groupings of numbers, the colors red or black, whether the number is odd or even, or if the numbers are high (19–36) or low (1–18).", 'image' => 'roulette.png', 'thumbnail' => 'roulette.png', 'is_active' => true]);
        GameAsset::create(['game_id' => 3, 'name' => 'Roulette Gems' , 'description' => "Roulette is a casino game named after the French word meaning little wheel. In the game, players may choose to place bets on either a single number, various groupings of numbers, the colors red or black, whether the number is odd or even, or if the numbers are high (19–36) or low (1–18).", 'image' => 'roulette.png', 'thumbnail' => 'roulette.png', 'is_active' => true]);
        GameAsset::create(['game_id' => 3, 'name' => 'Roulette Weapon' , 'description' => "Roulette is a casino game named after the French word meaning little wheel. In the game, players may choose to place bets on either a single number, various groupings of numbers, the colors red or black, whether the number is odd or even, or if the numbers are high (19–36) or low (1–18).", 'image' => 'roulette.png', 'thumbnail' => 'roulette.png', 'is_active' => true]);

        GameAsset::create(['game_id' => 4, 'name' => 'Slots Gold' , 'description' => "A slot machine (American English), known variously as a fruit machine (British English), puggy (Scottish English), the slots (Canadian English and American English), poker machine/pokies (Australian English and New Zealand English), fruities (British English) or slots (American English), is a gambling machine that creates a game of chance for its customers. Slot machines are also known pejoratively as one-armed bandits due to the large mechanical levers affixed to the sides of early mechanical machines and their ability to empty players' pockets and wallets as thieves would.", 'image' => 'slots.png', 'thumbnail' => 'slots.png', 'is_active' => true]);
        GameAsset::create(['game_id' => 4, 'name' => 'Slots Gems' , 'description' => "A slot machine (American English), known variously as a fruit machine (British English), puggy (Scottish English), the slots (Canadian English and American English), poker machine/pokies (Australian English and New Zealand English), fruities (British English) or slots (American English), is a gambling machine that creates a game of chance for its customers. Slot machines are also known pejoratively as one-armed bandits due to the large mechanical levers affixed to the sides of early mechanical machines and their ability to empty players' pockets and wallets as thieves would.", 'image' => 'slots.png', 'thumbnail' => 'slots.png', 'is_active' => true]);
        GameAsset::create(['game_id' => 4, 'name' => 'Slots Weapon' , 'description' => "A slot machine (American English), known variously as a fruit machine (British English), puggy (Scottish English), the slots (Canadian English and American English), poker machine/pokies (Australian English and New Zealand English), fruities (British English) or slots (American English), is a gambling machine that creates a game of chance for its customers. Slot machines are also known pejoratively as one-armed bandits due to the large mechanical levers affixed to the sides of early mechanical machines and their ability to empty players' pockets and wallets as thieves would.", 'image' => 'slots.png', 'thumbnail' => 'slots.png', 'is_active' => true]);

        \App\Models\User::factory(1)
        ->sequence(fn($a) => ['email' => "admin@gmail.com"])->create();
        \App\Models\User::factory(5)
        ->sequence(fn($a) => ['email' => "user$a->index@gmail.com"])->create();
        foreach (\App\Models\User::all() as $user) {
            $user->assignRole('user');
        }
        \App\Models\User::find(1)->assignRole('admin');
        PaymentMethod::create(['name' => 'Paypal' , 'logo' => 'paypal.png', 'fee' => 0.02, 'status' => true]);
        GamePackage::factory(100)->create();
    }
}
