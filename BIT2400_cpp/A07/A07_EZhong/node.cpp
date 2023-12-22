#include <iostream>
#include <string>
#include "node.h"

using namespace std;

node::node(string n, int y, double p, node* _next) {
	name = n;
	year = y;
	price = p;
	next = _next;
	previous = nullptr;
}
string node::getName() {
	return name;
}

//returning contents of node as a string
string node::getNode() {
	string nodeStr = "";
	nodeStr.append(name + " " + to_string(year) + " - $" + to_string(price));
	nodeStr.erase(nodeStr.find_last_not_of('0') + 1, string::npos);
	return nodeStr;
}

//print name and year of node
void node::print() {
	cout << name << " " << year << "\n";
}


