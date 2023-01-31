class User{
  String?id;
   String?name;
    String?phone;
     String?password;
      String?email;
       String?address;
        String?regdate;

User({
  required this.id,
  required this.name,
  required this.phone,
  required this.password,
  required this.email,
  required this.address,
  required this.regdate,
});

User.fromJson(Map<String, dynamic> json){
  id = json['id'];
  name = json['name'];
  phone = json['phone'];
  password = json['password'];
  email = json['email'];
  address = json['address'];
  regdate = json['regdate'];
}

  get credit => null;

Map<String, dynamic> toJson(){
  final Map<String, dynamic> data = <String, dynamic>{};
  data['id'] = id;
  data['name'] = name;
  data['phone'] = phone;
  data['password'] = password;
  data['email'] = email;
  data['address'] = address;
  data['regdate'] = regdate;
  return data;
}
}