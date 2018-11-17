
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(20000) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `article` (`id`, `title`, `content`, `image`, `author`) VALUES
(1,	'Bugatti Chiron',	'The CHIRON is the fastest, most powerful, and exclusive production super sports car in BUGATTIâ€™s history. Its sophisticated design, innovative technology, and iconic, performance-oriented form make it a unique masterpiece of art, form and technique, that pushes boundaries beyond imagination.\r\n\r\nBUGATTI owes its distinctive character to a family of artists and engineers, and has always strived to offer the extraordinary, the unrivalled, the best. Every element of the CHIRON is a combination of reminiscence to its history and the most innovative technology. The result is a unique creation of enduring value, and breathtaking automotive accomplishment.\r\n\r\nThe Skyview option was developed in accordance with the attributes that characterise the CHIRON. The symbolic horseshoe grill, and the distinctive C-bar on the side, still define it as unmistakably BUGATTI, as do its pronounced lines and generous surfaces. From inside, the glass roof enables a view into another dimension, flooding the cockpit with natural light.',	'bugatti.jpg',	'toto'),
(2,	'THE REGERA â€“ A NEW ERA',	'The new Koenigsegg Regera is specifically designed to be a luxury Megacar alternative to Koenigseggâ€™s traditional extreme, light weight, race-like road cars.\r\n\r\nThe Koenigsegg Regera combines a powerful twin-turbo V8 combustion engine with three electric motors and cutting edge battery power via new powertrain technology called Koenigsegg Direct Drive. This revolutionary technology removes the traditional gearbox, making the car lighter and more efficient.\r\n\r\nWhile traditional Koenigseggs have always had surprising levels of practicality, creature comforts and features, our primary focus has always been to make the fastest cars on the planet â€“ around a racetrack or anywhere else. The Koenigsegg Regera continues this tradition, but with innovative technology that blends outrageous speed, supreme comfort, and a unique Direct Drive experience.\r\n\r\nRegera is Swedish for â€œto Reignâ€ â€“ a suitable name for a machine that offers an unforeseen combination of power, responsiveness and luxury. The Regera will reign as king of the open road â€“ the fastest accelerating, most powerful production car ever.\r\n\r\nIn spite of all its advanced technology and creature comforts, the Regera is comparatively light and can still perform competitively around a race circuit. How does 3.2 seconds between 150 to 250 km/h and under 20 seconds from 0 to 400 km/h sound? The only Hypercar/Megacar that we think could possibly be faster around a circuit is another Koenigsegg.\r\n\r\nThe Regera is to be handcrafted in an edition of just 80 vehicles at Koenigseggâ€™s production facility in Ã„ngelholm, Sweden. This is the first time ever that Koenigsegg will have two different models in parallel production.',	'koes.jpg',	'toto'),
(3,	'Ferrari F12berlinetta',	'The Ferrari F12berlinetta (also unofficially referred to as the F12 Berlinetta or the F12, and unofficially stylized as the F12B for short) is a front mid-engine, rear-wheel-drive grand tourer produced by Italian sports car manufacturer Ferrari. The F12 Berlinetta debuted at the 2012 Geneva Motor Show, and replaces the 599 grand tourer.[5] The naturally aspirated 6.3 litre Ferrari V12 engine in the F12berlinetta has won the International Engine of the Year Awards 2013 in the Best Performance category and Best Engine above 4.0 litres. The F12berlinetta was named \"The Supercar of the Year 2012\" by car magazine Top Gear. The F12berlinetta was replaced by the Ferrari 812 Superfast in 2017.\r\n\r\nIn 2014 it was awarded the XXIII Premio Compasso d\'oro ADI. Accepting the award was Ferrariâ€™s Senior Vice President of Design, Flavio Manzoni.',	'ferrari.jpg',	'toto'),
(4,	'Citroen GT',	'Meet the super Citroen thatâ€™s a real play station! This striking concept demonstrates what can happen when the worlds of computer gaming and car design come together.\r\n\r\nRivalling any Ferrari or Lamborghini for visual drama, the GTbyCitroen â€“ to give it its full name â€“ was first seen at Octoberâ€™s Paris Motor Show. Now, it has hit the road, and Auto Express got behind the wheel for an exclusive drive.\r\n\r\nThe GT is here thanks to the passion of two enthusiasts: Citroen designer Takumi Yamamoto and the boss of Polyphony Digital â€“ the firm behind the award-winning Sony PlayStation racing game, Gran Turismo â€“ Kazunori Yamauchi. Essentially, the pair collaborated to create a supercar not for the road, but for the computer screen.\r\n\r\nSeveral sketches later, the GT was born. Yet they werenâ€™t content with having an exclusive machine for the best-selling game â€“ so Citroen decided to build the working concept you see here.\r\n\r\nThe car in the game uses a fuel cell, but this roadgoing model features a race-derived 560bhp V8 engine. No official figures have been provided, and Citroen is keeping tight-lipped about its performance. Judging by the pace on offer, though, weâ€™d guess at a 0-60mph time of around four seconds.',	'citroen_gt.jpg',	'root'),
(5,	'Aventador',	'Our dream was to create a one-of-a-kind open-top car. We made it come true with the Lamborghini Aventador Roadster, an unrivaled gem of a supercar.                                              \r\nEquipped with an exclusive technology package, the jewel in this car\'s crown is its carbon fiber monocoque. The elegance and vanity of a Roadster meet the power of a naturally aspirated 6.5 liter V-12 engine putting out 515 kW (700 CV), with incredible torque available at all engine speeds. The Aventador Roadster is an open-top supercar that combines sportiness and style. Discover the technical specifications and the full features of the Lamborghini Aventador Roadster',	'aventador.jpg',	'root'),
(6,	'Porsche',	'It also looks wider, with one-inch bigger wheels emphasising the fact that the rear track is wider than the front, bigger front air intakes and the horizontal lower edges of the headlight clusters lining up with the grille. Lighting is now all-LED, available in three layers of sophistication - standard, Dynamic, with a variety of light modes such as cornering and motorway, and Dynamic Plus, with 42 LEDs a side giving infinitely variable light distribution and intensity.\r\n\r\nCayenne 3G has plenty of sports-car features, including mixed tyre sizes, rear-axle steering and, for the first time on an SUV, an adaptive roof spoiler on the range-topping Turbo. Active all-wheel drive is standard, as is 4D chassis control, and on-road performance can be further boosted with three-chamber air suspension and electronic roll stabilisation.',	'porsche.jpg',	'root');

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `article` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `commentaire` (`id`, `username`, `content`, `article`) VALUES
(1,	'Jean',	'Nice car !',	'1'),
(2,	'Patrick',	'Beautiful car !',	'2'),
(3,	'vfr',	'I love red car :) !',	'3'),
(4,	'azer',	'This is a nice car !',	'3');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1,	'toto',	'$2y$12$HdTMeY7ANtUeW.AvoGTUuu0ThxBfdZbW9QYdSAWMNnJwLA/fgykIa'),
(2,	'root',	'$2y$12$1xaWFtajm6seFtqk1Q934OCRB751jQ9NKOX0dXRNK.6IrExatrsyK');