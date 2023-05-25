import 'package:flutter/material.dart';

class LoginPage extends StatefulWidget {
  const LoginPage({super.key});

  @override
  State<LoginPage> createState() => _LoginPageState();
}
class _LoginPageState extends State<LoginPage> {
  @override
  Widget build(BuildContext context) => Padding(
    padding: EdgeInsets.only(left: 40, right: 40),
    child: Column(
      children: [
        Padding(padding: EdgeInsets.only(top: 150)),
        Text("aseli", style: TextStyle(fontSize: 38, fontFamily: "Quantico")),
        Padding(padding: EdgeInsets.only(top: 50)),
        TextField(
          decoration: InputDecoration(
              prefixIcon: Icon(Icons.account_circle_sharp, color: Colors.grey),
              hintStyle: TextStyle(color: Color(0xff969696)),
              hintText: "Enter Username",
              border: OutlineInputBorder(
                  borderSide: BorderSide(color: Color(0xff0E8388), width: 1)
              ),
              enabledBorder: OutlineInputBorder(
                  borderSide: BorderSide(color: Color(0xff0E8388), width: 1)
              )
          ),
          style: TextStyle(fontSize: 18),
          autofocus: false,
        ),
        Padding(padding: EdgeInsets.only(top: 15)),
        TextField(
          decoration: InputDecoration(
              prefixIcon: Icon(Icons.lock, color: Colors.grey),
              hintStyle: TextStyle(color: Color(0xff969696)),
              hintText: "Enter Password",
              border: OutlineInputBorder(
                  borderSide: BorderSide(color: Color(0xff0E8388), width: 1)
              ),
              enabledBorder: OutlineInputBorder(
                  borderSide: BorderSide(color: Color(0xff0E8388), width: 1)
              )
          ),
          style: TextStyle(fontSize: 18),
          autofocus: false,
        ),
        Padding(
            padding: EdgeInsets.only(top: 10),
            child:
            Row(
              mainAxisAlignment: MainAxisAlignment.start,
              children: [
                SizedBox(
                    height: 24,
                    width: 24,
                    child: Transform.scale(
                        scale: 1.3,
                        child: Checkbox(
                            value: false,
                            checkColor: Colors.white,
                            side: MaterialStateBorderSide.resolveWith(
                                    (states) => BorderSide(width: 1.2, color: Color(0xff0E8388))
                            ),
                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(5),
                            ),
                            onChanged: null
                        )
                    )
                ),
                Padding(
                  padding: const EdgeInsets.only(left: 10),
                  child: Text("always remember",
                      style: TextStyle(
                          fontWeight: FontWeight.w400,
                          color: Colors.grey
                      )
                  ),
                )
              ],
            )
        ),
        Align(
          alignment: Alignment.centerRight,
          child: Text("Forgot password?",
            style: TextStyle(color: Color(0xff04C4CC)),
          ),
        ),
        Align(
            alignment: Alignment.center,
            child: Padding(
              padding: EdgeInsets.only(top: 10),
              child: ElevatedButton(
                style: ElevatedButton.styleFrom(
                    minimumSize: Size.fromHeight(50),
                    backgroundColor: Color(0xff0E8388)
                ),
                child: Text("Login",
                  style: TextStyle(
                      color: Colors.white,
                      fontSize: 16
                  ),
                ),
                onPressed: (){},
              ),
            )
        ),
        Padding(
          padding: const EdgeInsets.only(top: 40),
          child: Row(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Text("Dont have an account?", style: TextStyle(fontSize: 15),),
              Padding(padding: EdgeInsets.only(left: 10)),
              Text("Register now!",
                style: TextStyle(
                    fontSize: 15,
                    color: Color(0xff04C4CC)
                ),
              )
            ],
          ),
        ),
      ],
    ),
  );
}