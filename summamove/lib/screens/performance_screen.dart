import 'package:flutter/material.dart';

class PerformanceScreen extends StatefulWidget {
  static const routeName = '/performance';

  @override
  _PerformanceScreenState createState() => _PerformanceScreenState();
}

class _PerformanceScreenState extends State<PerformanceScreen> {
  List<String> performances = [];

  final TextEditingController _controller = TextEditingController();

  void _addPerformance() {
    _controller.clear();
    showDialog(
      context: context,
      builder: (ctx) => AlertDialog(
        title: Text('Nieuwe prestatie toevoegen'),
        content: TextField(
          controller: _controller,
          decoration: InputDecoration(hintText: 'Beschrijving'),
        ),
        actions: [
          TextButton(
              onPressed: () {
                Navigator.of(ctx).pop();
              },
              child: Text('Annuleren')),
          TextButton(
              onPressed: () {
                if (_controller.text.trim().isNotEmpty) {
                  setState(() {
                    performances.add(_controller.text.trim());
                  });
                }
                Navigator.of(ctx).pop();
              },
              child: Text('Toevoegen')),
        ],
      ),
    );
  }

  void _editPerformance(int index) {
    _controller.text = performances[index];
    showDialog(
      context: context,
      builder: (ctx) => AlertDialog(
        title: Text('Prestatie wijzigen'),
        content: TextField(
          controller: _controller,
          decoration: InputDecoration(hintText: 'Beschrijving'),
        ),
        actions: [
          TextButton(
              onPressed: () {
                Navigator.of(ctx).pop();
              },
              child: Text('Annuleren')),
          TextButton(
              onPressed: () {
                if (_controller.text.trim().isNotEmpty) {
                  setState(() {
                    performances[index] = _controller.text.trim();
                  });
                }
                Navigator.of(ctx).pop();
              },
              child: Text('Opslaan')),
        ],
      ),
    );
  }

  void _deletePerformance(int index) {
    showDialog(
      context: context,
      builder: (ctx) => AlertDialog(
        title: Text('Prestatie verwijderen?'),
        actions: [
          TextButton(
              onPressed: () {
                Navigator.of(ctx).pop();
              },
              child: Text('Nee')),
          TextButton(
              onPressed: () {
                setState(() {
                  performances.removeAt(index);
                });
                Navigator.of(ctx).pop();
              },
              child: Text('Ja')),
        ],
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Prestaties'),
        actions: [
          IconButton(
            icon: Icon(Icons.add),
            onPressed: _addPerformance,
            tooltip: 'Nieuwe prestatie toevoegen',
          )
        ],
      ),
      body: performances.isEmpty
          ? Center(
        child: Text(
          'Geen prestaties beschikbaar.\nDruk op + om een prestatie toe te voegen.',
          textAlign: TextAlign.center,
          style: TextStyle(fontSize: 16),
        ),
      )
          : ListView.builder(
        itemCount: performances.length,
        itemBuilder: (ctx, index) {
          return Card(
            margin: EdgeInsets.symmetric(vertical: 6, horizontal: 12),
            child: ListTile(
              title: Text(performances[index]),
              trailing: Row(
                mainAxisSize: MainAxisSize.min,
                children: [
                  IconButton(
                    icon: Icon(Icons.edit, color: Colors.blue),
                    onPressed: () => _editPerformance(index),
                    tooltip: 'Bewerken',
                  ),
                  IconButton(
                    icon: Icon(Icons.delete, color: Colors.red),
                    onPressed: () => _deletePerformance(index),
                    tooltip: 'Verwijderen',
                  ),
                ],
              ),
            ),
          );
        },
      ),
    );
  }
}
