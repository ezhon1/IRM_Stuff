#pragma once
#include <iostream>
#include <string>
#include "node.h"

using namespace std;

class list {
private:
	node* head;
	node* tail;
	int length;
public:
	list();

	void Display();
	int Length();
	void Delete();
	void Push(string n, int y, double p, node* _next);
	string Pop(int n);
	string Peek(int n);

	void Switch(node* n);

	void Sort();
	string Search(string s);

	void insertSorted(node* n);

};


