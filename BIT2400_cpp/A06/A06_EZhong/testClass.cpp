using namespace std;
#include "testClass.h"

testClass::testClass() {

}

string testClass::getClassContent() {
	string classContent = "";

	classContent.append(to_string(num) + ": " + content);	//append num and content

	return classContent;
}