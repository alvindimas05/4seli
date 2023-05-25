import 'package:flutter/material.dart';

class UserPage extends StatefulWidget {
  const UserPage({super.key});

  @override
  State<UserPage> createState() => _UserPageState();
}

class _UserPageState extends State<UserPage> {
  @override
  Widget build(BuildContext context) => Column(children: [
        Padding(
            padding: EdgeInsets.only(left: 30, right: 30, top: 60),
            child: Column(children: [
              Row(children: [
                Expanded(
                    flex: 5,
                    child: Text("aseli",
                        style:
                            TextStyle(fontFamily: "Quantico", fontSize: 25))),
                Expanded(
                    flex: 5,
                    child: Align(
                        alignment: Alignment.centerRight,
                        child: Icon(Icons.list, color: Colors.white, size: 40)))
              ]),
              Padding(padding: EdgeInsets.only(top: 40)),
              Row(children: [
                Expanded(
                  flex: 3,
                  child: Align(
                      alignment: Alignment.centerLeft,
                      child: ClipRRect(
                          borderRadius: BorderRadius.circular(150),
                          child: Image.network(
                              "https://via.placeholder.com/300",
                              width: 100,
                              height: 100))),
                ),
                Padding(padding: EdgeInsets.only(left: 10)),
                const Expanded(
                    flex: 7,
                    child: Align(
                      alignment: Alignment.topLeft,
                      child: Column(children: [
                        Align(
                            alignment: Alignment.centerLeft,
                            child: Text("Abyankuhhh",
                                style: TextStyle(fontSize: 18))),
                        Padding(padding: EdgeInsets.only(top: 20)),
                        Row(
                          children: [
                            Expanded(
                                flex: 3,
                                child: Align(
                                    alignment: Alignment.topLeft,
                                    child: Column(
                                      children: [
                                        Text("121",
                                            style: TextStyle(
                                                fontWeight: FontWeight.bold,
                                                fontSize: 18)),
                                        Text("Post",
                                            style: TextStyle(fontSize: 16))
                                      ],
                                    ))),
                            Expanded(
                                flex: 4,
                                child: Align(
                                    alignment: Alignment.topCenter,
                                    child: Column(
                                      children: [
                                        Text("810.7K",
                                            style: TextStyle(
                                                fontWeight: FontWeight.bold,
                                                fontSize: 18)),
                                        Text("Followers",
                                            style: TextStyle(fontSize: 16))
                                      ],
                                    ))),
                            Expanded(
                                flex: 4,
                                child: Align(
                                    alignment: Alignment.topRight,
                                    child: Column(
                                      children: [
                                        Text("36",
                                            style: TextStyle(
                                                fontWeight: FontWeight.bold,
                                                fontSize: 18)),
                                        Text("Following",
                                            style: TextStyle(fontSize: 16))
                                      ],
                                    )))
                          ],
                        ),
                        Padding(padding: EdgeInsets.only(top: 30)),
                        Row(children: [
                          Expanded(
                              flex: 5,
                              child: TextButton(
                                onPressed: null,
                                child: Text(
                                  "Edit Profile",
                                  style: TextStyle(color: Colors.white),
                                ),
                                style: ButtonStyle(
                                    backgroundColor: MaterialStatePropertyAll(
                                        Color(0xff0E8388))),
                              )),
                          Padding(padding: EdgeInsets.only(left: 5, right: 5)),
                          Expanded(
                              flex: 5,
                              child: TextButton(
                                onPressed: null,
                                child: Text(
                                  "Share Profile",
                                  style: TextStyle(color: Colors.white),
                                ),
                                style: ButtonStyle(
                                    backgroundColor: MaterialStatePropertyAll(
                                        Color(0xff0E8388))),
                              ))
                        ])
                      ]),
                    ))
              ])
            ]))
      ]);
}
