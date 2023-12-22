#pragma once
#include <iostream>
#include <vector>
#include <string>
using namespace std;

template <typename c>
class itemSet {
private:
	int numItems = 0;
	vector<c> itemList;
	int totNumItems;

public:
	void setTotNumItems(int a) {
		totNumItems = a;
	}
	void addItem(c* item);
	int getNumItems();
	void printItems();
};

template <typename c>
void itemSet<c>::addItem(c* item) {
	int check = 0;	// check whether item already exists
	for (int i = 0; i < totNumItems; i++) {
		if (itemList.size() == 0) {		//if vector is empty
			itemList.push_back(item[i]);	//set last (first) element of items to a
			numItems++;
		}
		else {
			for (int j = 0; j < itemList.size(); j++) {	//iterates through all elements of vector
				if (item[i] == itemList[j]) {				//if a already exists in the vector
					check = 1;							//item exists
				}
			}
			if (check == 0) {				//if a does not exist
				itemList.push_back(item[i]);	//add a to end of items
				numItems++;
			}
			check = 0;	//reset check
		}
	}
	
}

template <typename c>
int itemSet<c>::getNumItems() {
	return numItems;
}

template <typename c>
void itemSet<c>::printItems() {
	for (int i = 0; i < itemList.size(); i++) {
		cout << "        " << itemList[i] << "\n";
	}
}