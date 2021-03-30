create database nienluanct271;
use nienluanct271;

insert into quantri values('admin','$2y$12$P/UBekynLISCPfmWogBt1e7ZS.3o8bAXRJBjmR7cgCfTEFVNJSduq');

select * from hanghoa;

create table thuonghieu(
	idthuonghieu varchar(10) primary key,
    tenthuonghieu varchar(50)
    
);

drop table khachhang;
create table khachhang(
	taikhoan varchar(50) primary key,
    matkhau varchar(64),
    hokh varchar(40),
    tenkh varchar(40),
    gioitinh varchar(8),
    sdt varchar(11),
    diachi varchar(100),
    anhdaidien varchar(100)
);

select * from khachhang limit 10;

delete from khachhang where taikhoan != '';



