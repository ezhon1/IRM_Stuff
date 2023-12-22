import pandas as pd
import numpy as np 
import matplotlib as mpl
import matplotlib.pyplot as plt
import scipy
from scipy import stats
from pandas.tests.arrays.sparse.test_arithmetics import kind
from websocket import _ssl_compat

# importing and merging tables
collision2015 = pd.read_csv('2015_Tabular_Transportation_Collision_Data.csv')
collision2016 = pd.read_csv('2016_Tabular_Transportation_Collision_Data.csv')
collision2017 = pd.read_csv('2017_Tabular_Transportation_Collision_Data.csv')
collision2018 = pd.read_csv('2018_Tabular_Transportation_Collision_Data.csv')
collision2019 = pd.read_csv('2019_Tabular_Transportation_Collision_Data.csv')
collisionData = pd.concat([collision2015,collision2016,collision2017, collision2018,collision2019])

redLight2015 = pd.read_csv('Red_Light_Camera_Violations_2015.csv')
redLight2016 = pd.read_csv('Red_Light_Camera_Violations_2016.csv')
redLight2017 = pd.read_csv('Red_Light_Camera_Violations_2017.csv')
redLight2018 = pd.read_csv('Red_Light_Camera_Violations_2018.csv')
redLight2019 = pd.read_csv('Red_Light_Camera_Violations_2019.csv')
redLightData = pd.concat([redLight2015, redLight2016, redLight2017, redLight2018, redLight2019])

collisions = pd.read_csv('Traffic_Collisions_by_Location_2015_to_2019.csv')

# dropping unnecessary columns and rows
collisionData = collisionData.drop(['Anom_ID', 'Geo_ID', 'No__of_Bicycles', 'No__of_Motorcycles', 'No__of_Pedestrians', 'Max_Injury', 'No__of_Minimal', 'No__of_Minor', 'No__of_Major', 'No__of_Fatal', 'X', 'Y', 'Latitude', 'Longitude', 'ObjectId'], axis=1)
collisionData = collisionData[collisionData.Environment_Condition == '01 - Clear']
collisionData = collisionData[collisionData.Light == '01 - Daylight']
collisionData = collisionData[collisionData.Road_Surface_Condition == '01 - Dry']
collisionData = collisionData[collisionData.Traffic_Control_Condition == '01 - Functioning']
collisionData = collisionData[(collisionData.Accident_Location == '02 - Intersection related')|(collisionData.Accident_Location == '03 - At intersection')]

compareCollisionData = collisionData[(collisionData.Location == 'BASELINE RD @ MERIVALE RD (0002342)')|(collisionData.Location == 'BASELINE RD @ FISHER AVE (0002346)')]
#compareCollisionData.to_csv('compareCollisionData.csv')

collisionData = collisionData[(collisionData.Location == 'AVIATION PKWY @ MONTREAL RD (0008799)')|(collisionData.Location == 'BANK ST @ RIVERSIDE DR S (0002704)')|
                        (collisionData.Location == 'BRONSON AVE @ POWELL AVE (0007212)')|(collisionData.Location == 'CATHERINE ST @ KENT ST (0002707)')|
                        (collisionData.Location == 'CEDARVIEW RD @ FALLOWFIELD RD (0001603)')|(collisionData.Location == 'COLDREY AVE @ KIRKWOOD AVE (0006736)')|
                        (collisionData.Location == 'GLADSTONE AVE @ ROCHESTER ST (0006496)')|(collisionData.Location == 'HAWTHORNE RD @ LEITRIM RD (0009269)')|
                        (collisionData.Location == 'HERON RD @ 155 W OF BANK ST/CANADIAN TIRE SC (0008219)')|(collisionData.Location == 'INNES RD @ ORLEANS BLVD (0003611)')|
                        (collisionData.Location == "PRINCE OF WALES DR @ MEADOWLANDS DR/HOG'S BACK (0001629)")|(collisionData.Location == 'TENTH LINE RD @ VANGUARD DR (0004632)')|
                        (collisionData.Location == 'WALKLEY RD @ GLENHAVEN PRIV (0011424)')]
#collisionData.to_csv('collisionData.csv')



redLightData = redLightData.drop(['LATITUDE', 'LONGITUDE', 'X', 'Y', 'CAMERA_FACING'], axis=1)

collisions = collisions.drop(['Geo_ID', 'X', 'Y', 'Total_Cyclists_Collisions', 'F2015_Cyclist', 'F2016_Cyclists', 'F2017_Cyclists', 'F2018_Cyclists', 'F2019_Cyclists', 'Total_Pedestrians', 'F2015_Pedestrians', 'F2016_Pedestrians', 'F2017_Pedestrians', 'F2018_Pedestrians', 'F2019_Pedestrians', 'Xcoord', 'Ycoord', 'Longitude', 'Latitude', 'ObjectId'], axis=1)

compareCollisions = collisions[(collisions.Location == 'BASELINE RD @ FISHER AVE (0002346)')|(collisions.Location == "PRINCE OF WALES DR @ MEADOWLANDS DR/HOG'S BACK (0001629)")]
#compareCollisions.to_csv('compareCollisions.csv')

collisions = collisions[(collisions.Location == 'AVIATION PKWY @ MONTREAL RD (0008799)')|(collisions.Location == 'BANK ST @ RIVERSIDE DR S (0002704)')|
                        (collisions.Location == 'BRONSON AVE @ POWELL AVE (0007212)')|(collisions.Location == 'CATHERINE ST @ KENT ST (0002707)')|
                        (collisions.Location == 'CEDARVIEW RD @ FALLOWFIELD RD (0001603)')|(collisions.Location == 'COLDREY AVE @ KIRKWOOD AVE (0006736)')|
                        (collisions.Location == 'GLADSTONE AVE @ ROCHESTER ST (0006496)')|(collisions.Location == 'HAWTHORNE RD @ LEITRIM RD (0009269)')|
                        (collisions.Location == 'HERON RD @ 155 W OF BANK ST/CANADIAN TIRE SC (0008219)')|(collisions.Location == 'INNES RD @ ORLEANS BLVD (0003611)')|
                        (collisions.Location == "PRINCE OF WALES DR @ MEADOWLANDS DR/HOG'S BACK (0001629)")|(collisions.Location == 'TENTH LINE RD @ VANGUARD DR (0004632)')|
                        (collisions.Location == 'WALKLEY RD @ GLENHAVEN PRIV (0011424)')]
#collisions.to_csv('collisions.csv')

# making graphs
# xAxis = np.array(['2015', '2016', '2017', '2018', '2019'])
# yAxis= np.array([1, 2, 1, 2, 0])
#
# plt.xlabel("Year")
# plt.ylabel("Total number of angle collisions per year")
# plt.title("TENTH LINE RD @ VANGUARD DR (0004632) 2015-2019")
#
# plt.bar(xAxis, yAxis)
# plt.show()

#  Read data from the CSV for traffic information, add it to the new file and read updated file
traffic_location = pd.read_csv("Data.csv")

traffic_location.to_csv('new2.csv')

updated_traffic = pd.read_csv("rearend.csv")

#Select only the rows with specific data and update the new file 

updated_traffic= updated_traffic.loc[updated_traffic['Location'] =="HAWTHORNE RD @ LEITRIM RD (0009269)"]

updated_traffic.to_csv('new2.csv')
# based off code from https://www.w3schools.com/python/python_ml_linear_regression.asp

xAxis = np.array([0,0, 175,431,754])
yAxis= np.array([22,15,10,19,10])
zAxis = np.array([2015, 2016, 2017, 2018, 2019])

for (xi, yi, zi) in zip(xAxis, yAxis, zAxis):
    plt.text(xi, yi, zi, va='bottom', ha='left')

slope, intercept, r, p, std_err = stats.linregress(xAxis, yAxis)
plt.xlabel("Total number of red-light traffic camera violations per year")
plt.ylabel("Total number of accidents per year")
plt.title("BANK ST @ RIVERSIDE DR S (0002704)")

def linearFunction(xAxis):
 return slope * xAxis + intercept

linearmodel = list(map(linearFunction, xAxis))

print(r)

plt.scatter(xAxis, yAxis)

plt.plot(xAxis, linearmodel)

# plt.scatter(x, y)
plt.show()

