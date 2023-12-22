#pragma once
#include <iostream>
#include <string>

using namespace std;

class node {
private:
	string name;
	int year;
	double price;
public:
	node* previous;
	node* next;
	node(string n, int y, double p, node* _next = NULL);
	string getName();
	string getNode();
	void print();
};
