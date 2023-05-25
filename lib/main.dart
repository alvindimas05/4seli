import 'package:flutter/material.dart';
import 'login.dart';
import 'register.dart';
import 'user.dart';

void main() => runApp(const Main());

class Main extends StatelessWidget {
  const Main({super.key});

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) => MaterialApp(
      title: 'Flutter Demo',
      theme: ThemeData(
          fontFamily: "Poppins",
          textTheme: Theme.of(context).textTheme.apply(
              fontFamily: "Poppins",
              bodyColor: Colors.white,
              displayColor: Colors.white)),
      home: Scaffold(
          body: Container(
              alignment: Alignment.center,
              decoration: const BoxDecoration(
                  gradient: RadialGradient(
                center: Alignment(-0.0534, -1.2682),
                radius: 2.2682,
                colors: [
                  Color(0xFF0E5256),
                  Color(0xFF2F2C33),
                  Color(0xFF2C3333),
                ],
                stops: [0.0, 0.4, 1.0],
              )),
              child: const UserPage())));
}
