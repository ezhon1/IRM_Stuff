#include <iostream>
#include <string>
#include <algorithm>
#include "list.h"
#include "node.h"

using namespace std;

list::list() {
	head = nullptr;
	tail = nullptr;
	length = 0;
}

//display all contents of list
void list::Display() {
	int count = 0;
	cout << "Games: \n";
	if (head == nullptr) {			//if list is empty
		cout << "     ---\n";
	}
	else {							//if not empty, loop through and print each node
		node* temp = head;
		while (temp != nullptr) {
			cout << "     " << count << ". ";
			temp->print();
			temp = temp->next;
			count++;
		}
	}
	cout << endl;
}

//find length of list
int list::Length() {
	int count = 0;
	node* temp = head;
	while (temp != nullptr) {
		count++;
		temp = temp->next;
	}
	length = count;
	return count;
}

//delete everything in list
void list::Delete() {
	if (head != nullptr) {
		node* temp = head->next;
		node* prev = head;
		delete prev;
		while (temp != nullptr) {
			prev = temp;
			temp = temp->next;
			delete prev;
		}
		head = nullptr;
		tail = nullptr;
	}
}

//add node to end of list
void list::Push(string n, int y, double p, node* _next) {
	node* temp = new node(n, y, p, _next);
	if (head == nullptr) {
		head = temp;
	}
	else {
		tail->next = temp;
		temp->previous = tail;
	}
	tail = temp;
}

//return contents and delete specified node
string list::Pop(int n) {
	int idx = 0;
	node* temp = head;
	string info;

	while (idx != n) {
		temp = temp->next;
		idx++;
	}

	info = temp->getNode();

	if (temp->previous == nullptr) {
		head = temp->next;
	}
	else {
		temp->previous->next = temp->next;
	}

	if (temp->next == nullptr) {
		tail = temp->previous;
	}
	else {
		temp->next->previous = temp->previous;
	}
	delete temp;
	return info;
}

//return contents of specified node without deleting it
string list::Peek(int n) {
	node* prev = head;
	node* temp = head->next;
	string info;

	if (head->next == nullptr) {
		info = temp->getNode();
		return info;
	}

	for (int i = 0; i < n-1; i++) {
		prev = temp;
		temp = temp->next;
	}
	info = temp->getNode();
	return info;
}

//swap two nodes
void list::Switch(node* n) {
	if (n != nullptr && n->previous != nullptr) {
		node* one = n->previous->previous;
		node* two = n->previous;
		node* three = n;
		node* four = n->next;

		three->previous = one;

		if (one != nullptr) {
			one->next = three;
		}
		else {
			head = three;
		}

		three->next = two;
		two->previous = three;
		two->next = four;

		if (four != nullptr) {
			four->previous = two;
		}
		else {
			tail = two;
		}
	}
}

//sort list alphabetically using insertion search
void list::Sort() {
	if (head != nullptr && head->next != nullptr) {
		node* idx = head->next;

		while (idx != nullptr) {
			node* n = idx;
			while (n->previous != nullptr) {
				if (n->getNode() < n->previous->getNode()) {
					Switch(n);
				}
				else {
					break;
				}
			}
			idx = idx->next;
		}
	}
}

//search list for string s (case-sensitive) and return all matches
string list::Search(string s) {
	node* temp = head;
	string str = "";

	while (temp != nullptr) {									//while still in the list
		if (temp->getNode().find(s) != string::npos) {			//check if node contains s
			str.append("  " + temp->getNode() + "\n   ");		//if it does, append it to the string to be returned
		}
		temp = temp->next;
	}
	if (str == "") {
		str = "  ---";
	}
	return str;
}

void list::insertSorted(node* n) {
	if (head == NULL || n->getNode() < head->getNode()) {
		node* temp = n;
		temp->next = head;
		head = temp;
		cout << "head";
	}
	else {
		node* prev = head;
		node* current = head->next;
		while (current != NULL && current->getNode() < n->getNode()) {
			prev = current;
			current = current->next;
		}
		node* temp = n;
		temp->next = current;
		prev->next = temp;
		cout << "not";
	}
}