#include <iostream>
#include <string>
#include "list.h"
#include "node.h"

using namespace std;

//Emily Zhong
//BIT2400 A07
//08 Aug 2020

void main() {
	int check = 0;
	int a, n, c;
	string s;
	list list;

	//adding games to list
	list.Push("Sunrise", 2019, 10.24, NULL);
	list.Push("Wind flower", 2018, 6.18, NULL);
	list.Push("Evanesce II", 2018, 12.16, NULL);
	list.Push("Sunrise", 2018, 12.16, NULL);
	list.Push("Time and Fallen Leaves", 2014, 4.06, NULL);
	list.Push("Evanesce", 2014, 11.06, NULL);
	list.Push("Midnight Story", 2020, 11.05, NULL);

	//there are two ways to run this code: with and without user input
	cout << "Please enter a number corresponding to the options below: \n";
	cout << "1. Run Test\n";
	cout << "2. User Input\n";
	cin >> a;

	//without user input
	if (a == 1) {
		//display all items
		list.Display();
		//print number of items in list
		cout << "Number of Items: " << list.Length() << "\n";

		//add new game to end of list
		cout << "Add new game: \n";
		list.Push("Time of Our Life", 2019, 9.07, NULL);
		list.Display();

		//pop third game in list
		cout << "Pop third game: \n";
		cout << "     " << list.Pop(2) << "\n";

		//peek at fourth game in list
		cout << "Peek at fourth game: \n";
		cout << "     " << list.Peek(3) << "\n";

		//sort list alphabetically
		cout << "\nSort by name: \n";
		list.Sort();
		list.Display();

		node* n = new node("Mario Kart", 1998, 29.00);
		list.insertSorted(n);
		list.Display();

		//searching for name that exists
		cout << "Searching for 'Evan': \n";
		cout << "   " << list.Search("Evan") << "\n";
		//searching for name that does not exist
		cout << "Searching for 'Mario': \n";
		cout << "   " << list.Search("Mario") << "\n";
		//searching for name with multiple entries
		cout << "Searching for 'Sunrise': \n";
		cout << "   " << list.Search("Sunrise") << "\n";

		//delete contents of list
		cout << "\nDelete List: \n";
		list.Delete();
		list.Display();
	}
	//with user input
	else if (a == 2) {
		string name;
		int year;
		double price;
		while (check == 0) {
			cout << "Please enter a number corresponding to the options below: \n";
			cout << "     1. Display games\n";
			cout << "     2. Determine number of items\n";
			cout << "     3. Delete all games from list\n";
			cout << "     4. Add a new game\n";
			cout << "     5. Remove a game\n";
			cout << "     6. Display information for one game\n";
			cout << "     7. Sort games by name\n";
			cout << "     8. Search for a game (case-sensitive)\n";
			cout << "     9. End program\n";
			cin >> n;

			switch (n) {
			case 1:
				list.Display();
				break;
			case 2:
				cout << "\nNumber of Items: " << list.Length() << "\n\n";
				break;
			case 3:
				list.Delete();
				break;
			case 4:
				cout << "Please enter the name of the game: ";
				cin >> name;
				cout << "Please enter the year the game was released: ";
				cin >> year;
				cout << "Please enter the price of the game: ";
				cin >> price;
				list.Push(name, year, price, NULL);
				cout << "\nGame successfully added\n\n";
				break;
			case 5:
				cout << "Please enter the number of the game you would like to remove from the list below: \n";
				list.Display();
				cin >> c;
				cout << "     " << list.Pop(c) << " has been removed.\n\n";
				break;
			case 6:
				cout << "Please enter the number of the game you would like to see details for from the list below: \n";
				list.Display();
				cin >> c;
				cout << "     " << list.Peek(c) << "\n\n";
				break;
			case 7:
				list.Sort();
				cout << "Successfully sorted by name.\n\n";
				break;
			case 8:
				cout << "Please enter the game you would like to search for (case-sensitive): ";
				cin >> s;
				cout << "   " << list.Search(s) << "\n";
				break;
			case 9:
			default:
				check = 1;
				break;
			}
		}
	}

}