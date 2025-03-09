CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL
);

INSERT INTO users (name, age) VALUES
('Nguyễn Văn A', 25),
('Trần Thị B', 30),
('Lê Văn C', 22),
('Phạm Thị D', 28),
('Hoàng Văn E', 35),
('Nguyễn Văn F', 27),
('Trần Thị G', 31),
('Lê Văn H', 24),
('Phạm Thị I', 29),
('Hoàng Văn J', 40),
('Võ Thị K', 33),
('Đặng Văn L', 26),
('Bùi Thị M', 23),
('Tô Văn N', 37),
('Dương Thị O', 45);