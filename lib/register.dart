import 'package:flutter/material.dart';

class RegisterPage extends StatefulWidget {
  const RegisterPage({super.key});

  @override
  State<RegisterPage> createState() => _RegisterPageState();
}

class _RegisterPageState extends State<RegisterPage> {
  @override
  Widget build(BuildContext context) => Padding(
        padding: EdgeInsets.only(left: 40, right: 40),
        child: Column(
          children: [
            Padding(padding: EdgeInsets.only(top: 150)),
            Text("aseli",
                style: TextStyle(fontSize: 38, fontFamily: "Quantico")),
            Padding(padding: EdgeInsets.only(top: 50)),
            TextField(
              decoration: InputDecoration(
                  prefixIcon:
                      Icon(Icons.account_circle_sharp, color: Colors.grey),
                  hintStyle: TextStyle(color: Color(0xff969696)),
                  hintText: "Create Username",
                  border: OutlineInputBorder(
                      borderSide:
                          BorderSide(color: Color(0xff0E8388), width: 1)),
                  enabledBorder: OutlineInputBorder(
                      borderSide:
                          BorderSide(color: Color(0xff0E8388), width: 1))),
              style: TextStyle(fontSize: 18),
              autofocus: false,
            ),
            Padding(padding: EdgeInsets.only(top: 15)),
            TextField(
              decoration: InputDecoration(
                  prefixIcon: Icon(Icons.lock, color: Colors.grey),
                  hintStyle: TextStyle(color: Color(0xff969696)),
                  hintText: "Create Password",
                  border: OutlineInputBorder(
                      borderSide:
                          BorderSide(color: Color(0xff0E8388), width: 1)),
                  enabledBorder: OutlineInputBorder(
                      borderSide:
                          BorderSide(color: Color(0xff0E8388), width: 1))),
              style: TextStyle(fontSize: 18),
              autofocus: false,
            ),
            Padding(padding: EdgeInsets.only(top: 15)),
            TextField(
              decoration: InputDecoration(
                  prefixIcon: Icon(Icons.check, color: Colors.grey),
                  hintStyle: TextStyle(color: Color(0xff969696)),
                  hintText: "Confirm Password",
                  border: OutlineInputBorder(
                      borderSide:
                          BorderSide(color: Color(0xff0E8388), width: 1)),
                  enabledBorder: OutlineInputBorder(
                      borderSide:
                          BorderSide(color: Color(0xff0E8388), width: 1))),
              style: TextStyle(fontSize: 18),
              autofocus: false,
            ),
            Align(
                alignment: Alignment.center,
                child: Padding(
                  padding: EdgeInsets.only(top: 15),
                  child: ElevatedButton(
                    style: ElevatedButton.styleFrom(
                        minimumSize: Size.fromHeight(50),
                        backgroundColor: Color(0xff0E8388)),
                    child: Text(
                      "Register",
                      style: TextStyle(color: Colors.white, fontSize: 16),
                    ),
                    onPressed: () {},
                  ),
                )),
            Padding(
              padding: const EdgeInsets.only(top: 40),
              child: Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Text(
                    "Already have an account?",
                    style: TextStyle(fontSize: 15),
                  ),
                  Padding(padding: EdgeInsets.only(left: 10)),
                  Text(
                    "Login now!",
                    style: TextStyle(fontSize: 15, color: Color(0xff04C4CC)),
                  )
                ],
              ),
            ),
          ],
        ),
      );
}
