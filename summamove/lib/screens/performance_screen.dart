import 'package:flutter/material.dart';

class PerformanceScreen extends StatefulWidget {
  const PerformanceScreen({super.key});

  @override
  _PerformanceScreenState createState() => _PerformanceScreenState();
}

class _PerformanceScreenState extends State<PerformanceScreen> {
  List<Map<String, dynamic>> performances = [
    {'date': '2025-06-10', 'exercise': 'Traplopen', 'count': 5, 'user': 'Jan'},
    {'date': '2025-06-11', 'exercise': 'Push-ups', 'count': 10, 'user': 'Eva'},
  ];

  // Voor oefeningnamen gebruiken we een vaste lijst, dit kan je dynamisch maken.
  final List<String> exercises = ['Traplopen', 'Push-ups'];

  void _addPerformance(Map<String, dynamic> newPerformance) {
    setState(() {
      performances.add(newPerformance);
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Prestaties'),
        actions: [
          IconButton(
            icon: Icon(Icons.add),
            onPressed: () async {
              final result = await Navigator.push<Map<String, dynamic>>(
                context,
                MaterialPageRoute(
                  builder: (_) => AddPerformanceScreen(
                    exercises: exercises,
                  ),
                ),
              );
              if (result != null) {
                _addPerformance(result);
              }
            },
          )
        ],
      ),
      body: ListView.builder(
        itemCount: performances.length,
        itemBuilder: (context, index) {
          final p = performances[index];
          return ListTile(
            title: Text('${p['user']} - ${p['exercise']}'),
            subtitle: Text('Datum: ${p['date']} - Aantal: ${p['count']}'),
          );
        },
      ),
    );
  }
}

class AddPerformanceScreen extends StatefulWidget {
  final List<String> exercises;

  const AddPerformanceScreen({super.key, required this.exercises});

  @override
  _AddPerformanceScreenState createState() => _AddPerformanceScreenState();
}

class _AddPerformanceScreenState extends State<AddPerformanceScreen> {
  final _formKey = GlobalKey<FormState>();
  String _user = '';
  String? _selectedExercise;
  int? _count;
  DateTime? _selectedDate;

  Future<void> _pickDate() async {
    final now = DateTime.now();
    final picked = await showDatePicker(
      context: context,
      initialDate: _selectedDate ?? now,
      firstDate: DateTime(2020),
      lastDate: DateTime(now.year + 5),
    );
    if (picked != null) {
      setState(() {
        _selectedDate = picked;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Nieuwe Prestatie toevoegen'),
      ),
      body: Padding(
        padding: EdgeInsets.all(16),
        child: Form(
          key: _formKey,
          child: ListView(
            children: [
              TextFormField(
                decoration: InputDecoration(labelText: 'Naam van gebruiker'),
                validator: (value) =>
                value == null || value.isEmpty ? 'Vul een naam in' : null,
                onSaved: (value) => _user = value!,
              ),
              SizedBox(height: 16),
              DropdownButtonFormField<String>(
                decoration: InputDecoration(labelText: 'Naam van oefening'),
                items: widget.exercises
                    .map((e) => DropdownMenuItem(
                  value: e,
                  child: Text(e),
                ))
                    .toList(),
                validator: (value) =>
                value == null ? 'Selecteer een oefening' : null,
                onChanged: (value) {
                  setState(() {
                    _selectedExercise = value;
                  });
                },
                value: _selectedExercise,
              ),
              SizedBox(height: 16),
              TextFormField(
                decoration: InputDecoration(labelText: 'Aantal keer'),
                keyboardType: TextInputType.number,
                validator: (value) {
                  if (value == null || value.isEmpty) return 'Vul een aantal in';
                  final n = int.tryParse(value);
                  if (n == null || n <= 0) return 'Vul een geldig getal in';
                  return null;
                },
                onSaved: (value) => _count = int.parse(value!),
              ),
              SizedBox(height: 16),
              Row(
                children: [
                  Expanded(
                    child: Text(
                      _selectedDate == null
                          ? 'Geen datum geselecteerd'
                          : 'Geselecteerde datum: ${_selectedDate!.toLocal().toString().split(' ')[0]}',
                    ),
                  ),
                  TextButton(
                    onPressed: _pickDate,
                    child: Text('Datum kiezen'),
                  ),
                ],
              ),
              SizedBox(height: 20),
              ElevatedButton(
                onPressed: () {
                  if (_formKey.currentState!.validate()) {
                    if (_selectedDate == null) {
                      ScaffoldMessenger.of(context).showSnackBar(
                        SnackBar(content: Text('Selecteer een datum')),
                      );
                      return;
                    }
                    _formKey.currentState!.save();
                    Navigator.pop(context, {
                      'user': _user,
                      'exercise': _selectedExercise,
                      'count': _count,
                      'date': _selectedDate!.toIso8601String().split('T')[0],
                    });
                  }
                },
                child: Text('Toevoegen'),
              ),
            ],
          ),
        ),
      ),
    );
  }
}