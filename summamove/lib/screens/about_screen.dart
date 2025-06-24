import 'package:flutter/material.dart';

class AboutScreen extends StatelessWidget {
  const AboutScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('Over SummaMove')),
      body: Center(
        child: Text('SummaMove helpt studenten meer te bewegen op school.'),
      ),
    );
  }
}