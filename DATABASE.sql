CREATE DATABASE WEBPHIM;
USE WEBPHIM;

#drop database WEBPHIM;

CREATE TABLE THELOAI(
    ID INT not null AUTO_INCREMENT,
    TENTHELOAI text,
    PRIMARY KEY (ID)
);

CREATE TABLE PHIM(
    ID INT NOT NULL AUTO_INCREMENT,
    TENPHIMVN text,
    TENPHIMGOC text,
    TRANGTHAI text,
    NAMPHATHANH DATE,
    THOILUONG INT,
    CHATLUONG text,
    DOPHANGIAI text,
    NGONNGU text,
    ANHPHIM TEXT,
    NOIDUNGPHIM TEXT,
    DUONGDAN TEXT,
    DANHGIA INT,
    TRAILER TEXT,
    PRIMARY KEY (ID)
);

CREATE TABLE CHITIETDANHGIA(
    EMAILUSER VARCHAR(100),
    IDPHIM INT,
    DANHGIA FLOAT,
    PRIMARY KEY (EMAILUSER, IDPHIM)
);

CREATE TABLE PHIMDECU(
    IDPHIM INT PRIMARY KEY
);

CREATE TABLE CHITIETTHELOAI(
    IDPHIM INT,
    IDTHELOAI INT,
    PRIMARY KEY (IDPHIM, IDTHELOAI)
);

CREATE TABLE PHIMLE(
    IDPHIM INT,
    PRIMARY KEY (IDPHIM)
);

CREATE TABLE PHIMBO(
    IDPHIM INT,
    SOTAP INT,
    SOTAPHIENTAI INT,
    PRIMARY KEY (IDPHIM)
);
CREATE TABLE NGUOI(
    ID INT NOT NULL AUTO_INCREMENT,
    HOTEN text,
    NGAYSINH DATE,
    QUOCTICH text,
    TIEUSU TEXT,
    PRIMARY KEY (ID)
);
CREATE TABLE DAODIEN(
    IDDAODIEN INT NOT NULL PRIMARY KEY
);

CREATE TABLE DIENVIEN(
    IDDIENVIEN INT NOT NULL PRIMARY KEY
);

CREATE TABLE CHITIETDAODIEN(
    IDDAODIEN INT,
    IDPHIM INT,
    PRIMARY KEY (IDDAODIEN, IDPHIM)
);

CREATE TABLE CHITIETDIENVIEN(
    IDDIENVIEN INT,
    IDPHIM INT,
    PRIMARY KEY (IDDIENVIEN, IDPHIM)
);

CREATE TABLE QUOCGIA(
    ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY ,
    TEN text
);

CREATE TABLE CHITIETQUOCGIA(
    IDPHIM INT,
    IDQUOCGIA INT,
    PRIMARY KEY (IDPHIM, IDQUOCGIA)
);

CREATE TABLE USER(
    USERNAME VARCHAR(50) UNIQUE,
    PASSWORD VARCHAR(32),
    ISADMIN bit,
    EMAIL VARCHAR(100),
    HOTEN TEXT,
    NGAYSINH DATE,
    primary key (EMAIL)
);

CREATE TABLE COMMENT(
    ID INT NOT NULL AUTO_INCREMENT,
    EMAIL VARCHAR(50),
    IDPHIM INT,
    THOIGIAN DATETIME,
    NOIDUNG TEXT,
    PRIMARY KEY (ID)
);

ALTER TABLE CHITIETTHELOAI ADD CONSTRAINT FK_CHITIETTHELOAI_PHIM FOREIGN KEY (IDPHIM) REFERENCES PHIM(ID);
ALTER TABLE CHITIETTHELOAI ADD CONSTRAINT FK_CHITIETTHELOAI_THELOAI FOREIGN KEY (IDTHELOAI) REFERENCES THELOAI(ID);
ALTER TABLE PHIMLE ADD CONSTRAINT FK_PHIMLE_PHIM FOREIGN KEY (IDPHIM) REFERENCES PHIM(ID);
ALTER TABLE PHIMBO ADD CONSTRAINT FK_PHIMbO_PHIM FOREIGN KEY (IDPHIM) REFERENCES PHIM(ID);
ALTER TABLE CHITIETDAODIEN ADD CONSTRAINT FK_CHITIETDAODIEN_PHIM FOREIGN KEY (IDPHIM) REFERENCES PHIM(ID);
ALTER TABLE CHITIETDAODIEN ADD CONSTRAINT FK_CHITIETDAODIEN_DAODIEN FOREIGN KEY (IDDAODIEN) REFERENCES DAODIEN(IDDAODIEN);
ALTER TABLE CHITIETDIENVIEN ADD CONSTRAINT FK_CHITIETDIENVIEN_DIENVIEN FOREIGN KEY (IDDIENVIEN) REFERENCES DIENVIEN(IDDIENVIEN);
ALTER TABLE CHITIETDIENVIEN ADD CONSTRAINT FK_CHITIETDIENVIEN_PHIM FOREIGN KEY (IDPHIM) REFERENCES PHIM(ID);
ALTER TABLE CHITIETQUOCGIA ADD CONSTRAINT FK_CHITIETQUOCGIA_PHIM FOREIGN KEY (IDPHIM) REFERENCES PHIM(ID);
ALTER TABLE CHITIETQUOCGIA ADD CONSTRAINT FK_CHITIETQUOCGIA_QUOCGIA FOREIGN KEY (IDQUOCGIA) REFERENCES QUOCGIA(ID);
ALTER TABLE PHIMDECU ADD CONSTRAINT FK_PHIMDECU_PHIM FOREIGN KEY (IDPHIM) REFERENCES PHIM(ID);
ALTER TABLE COMMENT ADD CONSTRAINT FK_COMMENT_USER FOREIGN KEY (EMAIL) REFERENCES USER(EMAIL);
ALTER TABLE COMMENT ADD CONSTRAINT FK_COMMENT_PHIM FOREIGN KEY (IDPHIM) REFERENCES PHIM(ID);
ALTER TABLE CHITIETDANHGIA ADD CONSTRAINT CK_CHITIETDANHGIA_DANHGIA CHECK ( DANHGIA <= 5 );



INSERT INTO THELOAI(TENTHELOAI) VALUES ('Phim hành động'),
                                       ('Phim viễn tưởng'),
                                       ('Phim chiến tranh'),
                                       ('Phim hình sự'),
                                       ('Phim phiêu lưu'),
                                       ('Phim hài hước'),
                                       ('Phim võ thuật'),
                                       ('Phim kinh dị'),
                                       ('Phim hồi hộp - gây cấn'),
                                       ('Phim bí ẩn - siêu nhiên'),
                                       ('Phim cổ trang'),
                                       ('Phim thần thoại'),
                                       ('Phim tâm lý'),
                                       ('Phim tài liệu'),
                                       ('Phim tình cảm - lãng mạn'),
                                       ('Phim chính kịch - Drama'),
                                       ('Phim thể thao - âm nhạc'),
                                       ('Phim gia đình'),
                                       ('Phim hoạt hình');
INSERT INTO QUOCGIA(TEN) VALUES('Việt Nam');
INSERT INTO QUOCGIA(TEN) VALUES('Mỹ');
INSERT INTO QUOCGIA(TEN) VALUES('Hàn Quốc');
INSERT INTO QUOCGIA(TEN) VALUES('Trung Quốc');
INSERT INTO QUOCGIA(TEN) VALUES('Nhật Bản');
INSERT INTO QUOCGIA(TEN) VALUES('Hồng Kông');
INSERT INTO QUOCGIA(TEN) VALUES('Ấn Độ');
INSERT INTO QUOCGIA(TEN) VALUES('Thái Lan');
INSERT INTO QUOCGIA(TEN) VALUES('Pháp');
INSERT INTO QUOCGIA(TEN) VALUES('Đài Loan');
INSERT INTO QUOCGIA(TEN) VALUES('Úc');
INSERT INTO QUOCGIA(TEN) VALUES('Anh');
INSERT INTO QUOCGIA(TEN) VALUES('Cananda');
INSERT INTO QUOCGIA(TEN) VALUES('Quốc gia khác');

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('Captain Ameriaca 3: Nội chiến Siêu Anh Hùng', 'Captain America 3: Civil War', 'Hoàn tất', '2016-4-26', 147, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/1.jpg', 'Captain America: Civil War là câu chuyện theo
sau sự kiện Avengers: Age Of Ultron, các liên minh chính phủ trên toàn thế giới thông qua một hiệp ước được thiết lập
để điều chỉnh hoạt động của tất cả siêu anh hùng. Điều này gây ra sự phân cực trong nội bộ nhóm Avengers,
tạo nên hai phe gồm Iron Man và Captain America, gây ra một trận chiến sử thi giữa những người đồng đội.', null, null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('THIÊN TỈNH CHI LỘ', 'Legend of Awakening (2020)', 'chưa hoàn tất', '2020-4-23', 45, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/2.jpg', 'Bộ phim kể về thời Đại Nam Bắc Triều - người dân đã bị thú dữ tàn phá nên họ bắt đầu tu luyện như một vũ khí tự bảo vệ. Bốn anh hùng trẻ tuổi bắt đầu trên một hành trình hướng tới sự thức tỉnh. Lộ Bình và Tô Đường là trẻ mồ côi. Trường võ thuật Trạch Phong đưa họ vào khi họ còn trẻ và họ trở thành bạn tốt với Tần Tang và Yến Tây Phàm. Cả bốn làm một hiệp ước để trở thành một trong những người thức tỉnh, do đó bắt đầu trên một con đường nơi họ sẽ đối mặt với nhiều đối thủ khác nhau để đạt được mục tiêu của mình.', null, null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('QUỶ LÙN TINH NGHỊCH: CHUYẾN LƯU DIỄN THẾ GIỚI', 'Trolls World Tour (2020)', 'Hoàn tất', '2020-4-23', 45, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/3.jpg', 'Tiếp nối phần trước, Quỷ lùn tinh nghịch: Chuyến lưu diễn thế giới đưa người xem trở lại thế giới Trolls cùng Poppy, cô quỷ lùn vui vẻ nhất từng được biết tới. Qua lời kể của “già làng” King Peppy, nguồn gốc của vương quốc Trolls dần được hé lộ. Từ rất xưa tổ tiên trolls đã tạo ra cây đàn thần 6 dây, mỗi dây ứng với một thể loại nhạc khác nhau gồm pop, đồng quê - country, funk, techno, cổ điển và rock.', null, null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('CẬU BÉ MA II', 'Brahms: The Boy II (2019)', 'Hoàn tất', '2019-12-31', null, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/4.jpg', 'Gia đình Liza chuyển đến căn biệt thự Heelshire mà không hề biết về câu chuyện đẫm máu tại nơi này. Jude - con trai Liza đã phát hiện ra cậu bạn mới - Brahms trong hình hài búp bê sứ. Liza nhận ra ở Jude có những sự thay đổi khác thường từ ngày Brahms xuất hiện.', null, null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('ĐẢO KINH HOÀNG', 'Fantasy Island (2020)', 'Hoàn tất', '2020-2-6', 109, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/5.jpg', 'Gia đình Liza chuyển đến căn biệt thự Heelshire mà không hề biết về câu chuyện đẫm máu tại nơi này. Jude - con trai Liza đã phát hiện ra cậu bạn mới - Brahms trong hình hài búp bê sứ. Liza nhận ra ở Jude có những sự thay đổi khác thường từ ngày Brahms xuất hiện.', null, null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('TIẾNG GỌI NƠI HOANG DÃ', 'The Call of the Wild (2020)', 'Hoàn tất', '2020-2-6', 109, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/6.jpg', 'Gia đình Liza chuyển đến căn biệt thự Heelshire mà không hề biết về câu chuyện đẫm máu tại nơi này. Jude - con trai Liza đã phát hiện ra cậu bạn mới - Brahms trong hình hài búp bê sứ. Liza nhận ra ở Jude có những sự thay đổi khác thường từ ngày Brahms xuất hiện.', null, null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('SÁT THỦ VÔ CÙNG CỰC', 'Hitman: Agent Jun (2020)', 'Hoàn tất', '2020-2-6', 109, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/7.jpg', 'Gia đình Liza chuyển đến căn biệt thự Heelshire mà không hề biết về câu chuyện đẫm máu tại nơi này. Jude - con trai Liza đã phát hiện ra cậu bạn mới - Brahms trong hình hài búp bê sứ. Liza nhận ra ở Jude có những sự thay đổi khác thường từ ngày Brahms xuất hiện.', null, null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('ĐỨA CON CỦA THỜI TIẾT', 'Weathering With You (2019)', 'Hoàn tất', '2020-2-6', 109, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/8.jpg', 'Gia đình Liza chuyển đến căn biệt thự Heelshire mà không hề biết về câu chuyện đẫm máu tại nơi này. Jude - con trai Liza đã phát hiện ra cậu bạn mới - Brahms trong hình hài búp bê sứ. Liza nhận ra ở Jude có những sự thay đổi khác thường từ ngày Brahms xuất hiện.', '8.mkv', null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('TRUY TÌM PHÉP THUẬT', 'Onward (2020)', 'Hoàn tất', '2020-2-6', 109, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/9.jpg', 'Gia đình Liza chuyển đến căn biệt thự Heelshire mà không hề biết về câu chuyện đẫm máu tại nơi này. Jude - con trai Liza đã phát hiện ra cậu bạn mới - Brahms trong hình hài búp bê sứ. Liza nhận ra ở Jude có những sự thay đổi khác thường từ ngày Brahms xuất hiện.', null, null, null);

INSERT INTO PHIM(TENPHIMVN, TENPHIMGOC, TRANGTHAI, NAMPHATHANH, THOILUONG, CHATLUONG,
                 DOPHANGIAI, NGONNGU, ANHPHIM, NOIDUNGPHIM, DUONGDAN, DANHGIA, TRAILER) VALUES
('TÌM LẠI CẢM XÚC', 'Cashback (2007)', 'Hoàn tất', '2020-2-6', 109, 'Bản đẹp',
 'Full HD', 'Phụ đề + thuyết minh', 'img/PosterPhim/10.jpg', 'Gia đình Liza chuyển đến căn biệt thự Heelshire mà không hề biết về câu chuyện đẫm máu tại nơi này. Jude - con trai Liza đã phát hiện ra cậu bạn mới - Brahms trong hình hài búp bê sứ. Liza nhận ra ở Jude có những sự thay đổi khác thường từ ngày Brahms xuất hiện.', '10.mp4', null, 'siXe9XC723s');

INSERT INTO PHIMDECU VALUES (10),(9),(8),(7),(6),(5),(4),(3),(2);

INSERT INTO USER(USERNAME, PASSWORD, ISADMIN, EMAIL, HOTEN, NGAYSINH) VALUES
('DuyDoan', 'e10adc3949ba59abbe56e057f20f883e', 1, 'duydoan1411@gmail.com', 'Đoàn Bảo Duy', '1999-11-14');
INSERT INTO USER(USERNAME, PASSWORD, ISADMIN, EMAIL, HOTEN, NGAYSINH) VALUES
('DuyDoan1', 'e10adc3949ba59abbe56e057f20f883e', 0, 'duydoan1411user@gmail.com', 'Đoàn Bảo Duy', '1999-11-14');

INSERT INTO NGUOI(HOTEN, NGAYSINH, QUOCTICH, TIEUSU) VALUE('Tim Burton', '1958/8/25', 'Mỹ', 'Timothy Walter "Tim" Burton là đạo diễn, nhà sản xuất, nhà văn, nhà thơ và nghệ sĩ và nghệ sĩ hoạt hình động người Mỹ');
INSERT INTO NGUOI(HOTEN, NGAYSINH, QUOCTICH, TIEUSU) VALUE('Gore Verbinski', '1964/3/16', 'Mỹ', 'Gregor "Gore" Verbinski là một đạo diễn phim, nhà biên kịch, nhà sản xuất và nhạc sĩ người Mỹ. Ông được biết đến nhiều nhất vì đã đạo diễn 3 phần của loạt phim Cướp biển vùng Caribbean, Vòng tròn định mệnh, và Rango. Verbinski tốt nghiệp trường Điện ảnh, Phim và Truyền hình UCLA.');
INSERT INTO NGUOI(HOTEN, NGAYSINH, QUOCTICH, TIEUSU) VALUE('Chris Columbus', '1958/9/10', 'Mỹ', 'Christopher Columbus là nhà làm phim Mỹ gốc Ý và Séc.');
INSERT INTO NGUOI(HOTEN, NGAYSINH, QUOCTICH, TIEUSU) VALUE('Robert Zemeckis', '1952/5/14', 'Mỹ', 'Robert Lee Zemeckis là một nhà làm phim và nhà biên kịch người Mỹ. Zemeckis được xem là một trong những "người kể chuyện trực quan" vĩ đại nhất trong việc làm phim và là một nhà tiên phong trong việc sử dụng hiệu ứng hình ảnh. Ông đã chỉ đạo một số trong những phim bom tấn lớn nhất trong vài thập kỷ qua.');
INSERT INTO NGUOI(HOTEN, NGAYSINH, QUOCTICH, TIEUSU) VALUE('Christopher Nolan', '1970/7/30', 'Anh', 'Christopher Edward Nolan là một đạo diễn, nhà biên kịch và nhà sản xuất điện ảnh người Anh. Ông sở hữu cả hai quốc tịch Anh và Mỹ. Nolan là một trong những đạo diễn ăn khách nhất lịch sử, đồng thời là một trong những nhà làm phim được hoan nghênh nhất và có tầm ảnh hưởng lớn nhất của thế kỉ 21.');
INSERT INTO NGUOI(HOTEN, NGAYSINH, QUOCTICH, TIEUSU) VALUE('David Yates', '1963/10/8', 'Anh', 'David Yates là một nhà làm phim người Anh, người đã chỉ đạo các bộ phim, phim ngắn và sản xuất truyền hình. Yates được biết đến nhiều nhất khi chỉ đạo bốn bộ phim cuối cùng trong loạt phim Harry Potter.');
INSERT INTO NGUOI(HOTEN, NGAYSINH, QUOCTICH, TIEUSU) VALUE('Michael Bay', '1965/2/17', 'Mỹ', 'Michael Benjamin Bay là một đạo diễn kiêm nhà sản xuất phim người Mỹ. Bay nổi tiếng với những bộ phim có kinh phí lớn như Armageddon, The Rock, Bad Boys, Bad Boys II, Transformers, Transformers: Revenge of the Fallen, Transformers: Dark of the Moon, Transformers: Age of Extinction.');

INSERT INTO DAODIEN values (1),(2),(3),(4),(5),(6),(7);

INSERT INTO NGUOI(HOTEN, NGAYSINH, QUOCTICH, TIEUSU) VALUE ('Christopher Robert Evans', '1981/6/13', 'Mỹ', 'Christopher Robert Evans began his acting career in typical fashion: performing in school productions and community theatre. He was born in Boston, Massachusetts, the son of Lisa (Capuano), who worked at the Concord Youth Theatre, and G. Robert Evans III, a dentist. His uncle is congressman Mike Capuano.');
INSERT INTO NGUOI(HOTEN, NGAYSINH, QUOCTICH, TIEUSU) VALUE ('Robert Downey Jr.', '1965/4/4', 'Mỹ', 'Robert Downey Jr. has evolved into one of the most respected actors in Hollywood. With an amazing list of credits to his name, he has managed to stay new and fresh even after over four decades in the business. Downey was born April 4, 1965 in Manhattan, New York, the son of writer, director and filmographer Robert Downey Sr. and actress Elsie Downey.');
INSERT INTO NGUOI(HOTEN, NGAYSINH, QUOCTICH, TIEUSU) VALUE ('Scarlett Johansson', '1984/11/22', 'Mỹ', 'Scarlett Johansson was born in New York City. Her mother, Melanie Sloan, is from a Jewish family from the Bronx, and her father, Karsten Johansson, is a Danish-born architect, from Copenhagen. She has a sister, Vanessa Johansson, who is also an actress, a brother, Adrian, a twin brother, Hunter Johansson, born three minutes after her, and a ... ');
INSERT INTO NGUOI(HOTEN, NGAYSINH, QUOCTICH, TIEUSU) VALUE ('Sebastian Stan', '1982/8/13', 'Romania', 'Sebastian Stan was born on August 13, 1982, in Constanta, Romania. He moved with his mother to Vienna, Austria, when he was eight, and then to New York when he was twelve. Stan studied at Rutgers Mason Gross School of the Arts and spent a year at Shakespeare''s Globe Theatre in London. When he went back to New York he started working in some ...');
INSERT INTO NGUOI(HOTEN, NGAYSINH, QUOCTICH, TIEUSU) VALUE ('Anthony Mackie', '1978/9/23', 'Mỹ', 'Anthony Mackie is an American actor. He was born in New Orleans, Louisiana, to Martha (Gordon) and Willie Mackie, Sr., who owned a business, Mackie Roofing. Anthony has been featured in feature films, television series and Broadway and Off-Broadway plays, including Ma Rainey''s Black Bottom, Drowning Crow, McReele, A Soldier''s Play, and Talk, by ...');
INSERT INTO NGUOI(HOTEN, NGAYSINH, QUOCTICH, TIEUSU) VALUE ('Donald Frank Cheadle', '1964/11/29', 'Mỹ', 'Donald Frank Cheadle was born in Kansas City, Missouri on November 29, 1964. His childhood found him moving from city to city with his family: mother Bettye (North), a teacher, father Donald Frank Cheadle, Sr., a clinical psychologist, sister Dawn, and brother Colin. After graduating high school in Denver, Colorado, Cheadle attended and graduated ... ');
INSERT INTO NGUOI(HOTEN, NGAYSINH, QUOCTICH, TIEUSU) VALUE ('Jeremy Lee Renner', '1971/1/7', 'Mỹ', 'eremy Lee Renner was born in Modesto, California, the son of Valerie (Tague) and Lee Renner, who managed a bowling alley. After a tumultuous yet happy childhood with his four younger siblings, Renner graduated from Beyer High School and attended Modesto Junior College. He explored several areas of study, including computer science, criminology, ...');

INSERT INTO DIENVIEN values (8),(9),(10),(11),(12),(13),(14);
SELECT * FROM NGUOI;
SELECT * FROM PHIM;
select * from CHITIETQUOCGIA;
select * from CHITIETDANHGIA;
Select PHIM.ID, HOTEN, NGAYSINH, QUOCTICH, TIEUSU from DAODIEN, NGUOI, CHITIETDAODIEN, PHIM
WHERE NGUOI.ID = DAODIEN.IDDAODIEN and CHITIETDAODIEN.IDDAODIEN = DAODIEN.IDDAODIEN and PHIM.ID = CHITIETDAODIEN.IDPHIM
  and PHIM.ID = 13
#test

#testgit