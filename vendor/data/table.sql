-- tabel admin
CREATE TABLE `admin` (
    `id_admin` int(11) NOT NULL AUTO_INCREMENT,
    `nama` varchar(50) NOT NULL,
    `email` varchar(75) NOT NULL,
    `telp` varchar(15) NOT NULL,
    `password` varchar(255) NOT NULL,
    `foto` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id_admin`),
    UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB;

-- data tabel admin
INSERT INTO `admin` (`id_admin`, `nama`, `email`, `telp`, `password`, `foto`) VALUES (NULL, 'admin', 'admin@gmail.com', '08787978652', MD5('password'), NULL);

-- tabel anggota
CREATE TABLE `anggota` (
    `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
    `kode_anggota` int(11) NOT NULL,
    `nama` varchar(50) NOT NULL,
    `email` varchar(75) NOT NULL,
    `telp` varchar(15) NOT NULL,
    `alamat` text NOT NULL,
    `foto` varchar(255) DEFAULT NULL,
    `jenis_kelamin` enum('L','P') NOT NULL,
    PRIMARY KEY (`id_anggota`),
    UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB;

-- data tabel anggota
INSERT INTO anggota (nama, kode_anggota, telp, email, alamat, jenis_kelamin)
VALUES
    ("Brianna Perkins","M-01","39-348-535-760","blandit.nam@gmail.com","168-2015 Duis St.", "P"),
    ("Wang Le","M-02","06-784-636-794","egestas@gmail.com","623-8088 Et Street", "L"),
    ("Kato Mathis","M-03","93-573-525-648","non.ante.bibendum@gmail.com","P.O. Box 599, 681 Dis Avenue", "L"),
    ("Kimberley Waters","M-04","62-557-398-553","sed@gmail.com","Ap #126-9715 Montes, Avenue", "P"),
    ("Rhoda Wooten","M-05","72-456-868-878","pharetra.nam@gmail.com","Ap #129-2675 Sollicitudin St.", "P"),
    ("Ezra Boyle","M-06","23-830-461-756","rutrum.urna.nec@gmail.com","677-4726 Lectus Av.", "P"),
    ("Noble Haney","M-07","82-485-213-382","magna.nam@gmail.com","6023 In, Rd.", "P");
    -- ("Gannon Mccray","M-08","48-418-680-298","aliquam.ultrices@gmail.com","Ap #876-398 Et, Rd.", "L"),
    -- ("Olga Ochoa","M-09","56-698-568-752","nisi.cum@gmail.com","P.O. Box 569, 3408 Porttitor Rd.", "L"),
    -- ("Thomas Burch","M-10","14-373-287-738","elit.curabitur@gmail.com","6390 Lacinia. Rd.", "L"),
    -- ("Darius Mitchell","M-11","44-412-175-178","egestas.aliquam.fringilla@gmail.com","Ap #380-9452 Tristique Street", "L"),
    -- ("Roanna Morrow","M-12","25-661-188-782","ac.libero@gmail.com","5221 Vel Ave", "L"),
    -- ("Claudia Moss","M-13","26-645-158-682","commodo.ipsum@gmail.com","903-2076 Eros. Ave", "P"),
    -- ("Dana Nunez","M-14","59-645-381-842","duis.dignissim.tempor@gmail.com","391-4424 Lorem, Rd.", "P"),
    -- ("Wyatt Norman","M-15","88-588-018-119","adipiscing.non@gmail.com","664-8884 Porta Street", "L"),
    -- ("Donna Owen","M-16","57-871-151-068","libero.donec@gmail.com","152-7365 Aliquam Road", "L"),
    -- ("Lila Hatfield","M-17","66-028-667-583","suspendisse.ac.metus@gmail.com","187-8164 Sed St.", "P"),
    -- ("Aileen Anderson","M-18","21-534-782-863","sem@gmail.com","Ap #998-4338 Molestie Road", "L"),
    -- ("Zenia Bowen","M-19","54-525-900-481","mauris.nulla@gmail.com","365-4769 Ipsum. Avenue", "L"),
    -- ("Hashim Padilla","M-20","88-861-639-543","lectus.a@gmail.com","6481 Morbi Ave", "L"),
    -- ("Graham Hawkins","M-21","07-513-372-505","hymenaeos.mauris@gmail.com","239-164 Aliquet, St.", "L"),
    -- ("Aileen Buchanan","M-23","16-366-432-814","eu.turpis@gmail.com","789-9022 Facilisis Street", "L"),
    -- ("Willa Shepherd","M-24","76-174-939-831","primis.in.faucibus@gmail.com","P.O. Box 583, 5360 Consequat Rd.", "P");


-- tabel buku
CREATE TABLE `buku` (
    `id_buku` int(11) NOT NULL AUTO_INCREMENT,
    `kode_buku` int(11) NOT NULL ,
    `judul` varchar(50) NOT NULL,
    `keterangan` text NOT NULL,
    `pengarang` varchar(50) NOT NULL,
    `penerbit` varchar(50) NOT NULL,
    `tahun` varchar(4) NOT NULL,
    'status' enum('Ready','Booked') NOT NULL DEFAULT 'Ready',
    PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB;

INSERT INTO buku (kode_buku, judul, pengarang, penerbit, tahun, keterangan)
VALUES
("B-01","Beautiful World, Where Are You","Sally Rooney","Faber","2021","Beautiful World, Where Are You is a new novel by Sally Rooney, the bestselling author of Normal People and Conversations with Friends.Alice, a novelist, meets Felix, who works in a warehouse, and asks him if hed like to travel to Rome with her. In Dublin, her best friend, Eileen, is getting over a break-up and slips back into flirting with Simon, a man she has known sinceBeautiful World, Where Are You is a new novel by Sally Rooney, the bestselling author of Normal People and Conversations with Friends.Alice, a novelist, meets Felix, who works in a warehouse, and asks him if hed like to travel to Rome with her. In Dublin, her best friend, Eileen, is getting over a break-up and slips back into flirting with Simon, a man she has known since childhood. Alice, Felix, Eileen, and Simon are still young—but life is catching up with them. They desire each other, they delude each other, they get together, they break apart. They have sex, they worry about sex, they worry about their friendships and the world they live in. Are they standing in the last lighted room before the darkness, bearing witness to something? Will they find a way to believe in a beautiful world?"),
("B-02","Harry Potter and the Half-Blood Prince (Harry Potter #6)","J.K. Rowling","Bloomsbury","2006","The war against Voldemort is not going well; even Muggle governments are noticing. Ron scans the obituary pages of the Daily Prophet, looking for familiar names. Dumbledore is absent from Hogwarts for long stretches of time, and the Order of the Phoenix has already suffered losses.And yet . . .As in all wars, life goes on. The Weasley twins expand their business. Sixth-yeaThe war against Voldemort is not going well; even Muggle governments are noticing. Ron scans the obituary pages of the Daily Prophet, looking for familiar names. Dumbledore is absent from Hogwarts for long stretches of time, and the Order of the Phoenix has already suffered losses.And yet . . .As in all wars, life goes on. The Weasley twins expand their business. Sixth-year students learn to Apparate - and lose a few eyebrows in the process. Teenagers flirt and fight and fall in love. Classes are never straightforward, through Harry receives some extraordinary help from the mysterious Half-Blood Prince.So its the home front that takes center stage in the multilayered sixth installment of the story of Harry Potter. Here at Hogwarts, Harry will search for the full and complete story of the boy who became Lord Voldemort - and thereby find what may be his only vulnerability."),
("B-03","Harry Potter and the Order of the Phoenix (Harry Potter #5)","J.K. Rowling & Mary GrandPré","Bloomsbury","2004","There is a door at the end of a silent corridor. And its haunting Harry Potters dreams. Why else would he be waking in the middle of the night, screaming in terror?Harry has a lot on his mind for this, his fifth year at Hogwarts: a Defense Against the Dark Arts teacher with a personality like poisoned honey; a big surprise on the Gryffindor Quidditch team; and the loominThere is a door at the end of a silent corridor. And its haunting Harry Potters dreams. Why else would he be waking in the middle of the night, screaming in terror?Harry has a lot on his mind for this, his fifth year at Hogwarts: a Defense Against the Dark Arts teacher with a personality like poisoned honey; a big surprise on the Gryffindor Quidditch team; and the looming terror of the Ordinary Wizarding Level exams. But all these things pale next to the growing threat of He-Who-Must-Not-Be-Named - a threat that neither the magical government nor the authorities at Hogwarts can stop.As the grasp of darkness tightens, Harry must discover the true depth and strength of his friends, the importance of boundless loyalty, and the shocking price of unbearable sacrifice.His fate depends on them all."),
("B-04","Simply Beautiful Beading: 53 Quick and Easy Projects","Heidi Boyd","David & Charles","2004","Blend your creative spirit with the quick and easy projects found inside Simply Beautiful Beading.From casual to sophisticated, and everything in between, youll find beading designs to fit your personal style. Inside, youll discover 53 simple yet stylish beading projects for exquisite jewelry, accessories and home decor, including: •modern glass bead chokers•semipreciousBlend your creative spirit with the quick and easy projects found inside Simply Beautiful Beading.From casual to sophisticated, and everything in between, youll find beading designs to fit your personal style. Inside, youll discover 53 simple yet stylish beading projects for exquisite jewelry, accessories and home decor, including: •modern glass bead chokers•semiprecious stone set•charm bracelets•wired-pearl barrettes•wineglass charms•hanging votive candle holder•and more than 35 variation projects for even more simply beautiful ideas!"),
("B-05","The Subtle Art of Not Giving a F*ck: A Counterintuitive Approach to Living a Good Life","Mark Manson","HarperCollins","2016","a superstar blogger cuts through the crap to show us how to stop trying to be positive all the time so that we can truly become better, happier people.For decades, weve been told that positive thinking is the key to a happy, rich life. F**k positivity, Mark Manson says. Lets be honest, shit is f**ked and we have to live with it. In his wildly popular Internet blog, Manson doesnt sugarcoat or equivocate. He tells it like it is—a dose of raw, refreshing, honest truth that is sorely lacking today. The Subtle Art of Not Giving a F**k is his antidote to the coddling, lets-all-feel-good mindset that has infected American society and spoiled a generation, rewarding them with gold medals just for showing up.Manson makes the argument, backed both by academic research and well-timed poop jokes, that improving our lives hinges not on our ability to turn lemons into lemonade, but on learning to stomach lemons better. Human beings are flawed and limited—not everybody can be extraordinary, there are winners and losers in society, and some of it is not fair or your fault. Manson advises us to get to know our limitations and accept them. Once we embrace our fears, faults, and uncertainties, once we stop running and avoiding and start confronting painful truths, we can begin to find the courage, perseverance, honesty, responsibility, curiosity, and forgiveness we seek.There are only so many things we can give a f**k about so we need to figure out which ones really matter, Manson makes clear. While money is nice, caring about what you do with your life is better, because true wealth is about experience. A much-needed grab-you-by-the-shoulders-and-look-you-in-the-eye moment of real-talk, filled with entertaining stories and profane, ruthless humor, The Subtle Art of Not Giving a F**k is a refreshing slap for a generation to help them lead contented, grounded lives.");


-- tabel transaksi
CREATE TABLE `transaksi` (
    `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
    `id_anggota` int(11) NOT NULL,
    `id_buku` int(11) NOT NULL,
    `tgl_pinjam` date NOT NULL,
    `tgl_kembali` date NOT NULL,
    `tgl_kembali_asli` date DEFAULT NULL,
    PRIMARY KEY (`id_transaksi`),
    CONSTRAINT `fk_transaksi_anggota` FOREIGN KEY (id_anggota)
    REFERENCES anggota (id_anggota)
    ON DELETE CASCADE ON UPDATE RESTRICT,

    CONSTRAINT `fk_transaksi_buku` FOREIGN KEY (id_buku)
    REFERENCES buku (id_buku)
    ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB;

-- data tabel transaksi
INSERT INTO transaksi(id_anggota, id_buku, tgl_pinjam, tgl_kembali)
VALUES
('2','1','2022-08-02','2022-08-09'),
('4','2','2022-08-05','2022-08-12'),
('9','4','2022-08-07','2022-08-14');