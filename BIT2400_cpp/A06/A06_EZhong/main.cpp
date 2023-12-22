#include <iostream>
#include "itemSet.h"
using namespace std;

void main() {
	int* set1;
	double* set2;
	string* set3;
	itemSet<int> itemSet1;
	itemSet<double> itemSet2;
	itemSet<string> itemSet3;

	int numItems;

	cout << "---Example 1: Set of integers---\n";
	cout << "--------------------------------\n";
	numItems = 5;
	set1 = new int[numItems] {10, 5, 15, 25, 15};
	itemSet1.setTotNumItems(numItems);
	for (int i = 0; i < numItems; i++) {
		cout << "Adding: " << set1[i] << "\n";
	}
	itemSet1.addItem(set1);
	cout << "--------------------------------\n";
	cout << "The first set has " << itemSet1.getNumItems() << " items.\n";
	cout << "They are: \n";
	itemSet1.printItems();
	cout << "\n";
	delete[] set1;

	cout << "--------------------------------\n";
	cout << "---Example 2: Set of doubles---\n";
	cout << "--------------------------------\n";
	numItems = 5;
	set2 = new double[numItems] {1.5, 5.6,12.8,1.5,12.8};
	itemSet2.setTotNumItems(numItems);
	for (int i = 0; i < numItems; i++) {
		cout << "Adding: " << set2[i] << "\n";
	}
	itemSet2.addItem(set2);
	cout << "--------------------------------\n";
	cout << "The second set has " << itemSet2.getNumItems() << " items.\n";
	cout << "They are: \n";
	itemSet2.printItems();
	cout << "\n";
	delete[] set2;

	cout << "--------------------------------\n";
	cout << "---Example 3: Set of strings---\n";
	cout << "--------------------------------\n";
	numItems = 4;
	set3 = new string[numItems]{ "John Smith", "Jane Doe", "John Smith", "Jack Black" };
	itemSet3.setTotNumItems(numItems);
	for (int i = 0; i < numItems; i++) {
		cout << "Adding: " << set3[i] << "\n";
	}
	itemSet3.addItem(set3);
	cout << "--------------------------------\n";
	cout << "The third set has " << itemSet3.getNumItems() << " items.\n";
	cout << "They are: \n";
	itemSet3.printItems();
	cout << "\n";
	delete[] set3;
}