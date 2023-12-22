import os
import snscrape
import snscrape.modules.twitter as sntwitter
import pandas as pd

#cbcottraffic tweet list
cbc_list = []

# Using TwitterSearchScraper to scrape data and append tweets to list created above
for i,tweet in enumerate(sntwitter.TwitterSearchScraper('#otttraffic from:cbcotttraffic since:2020-01-01 until:2022-01-01').get_items()):
    if i>6000:
        break
    cbc_list.append([tweet.date, tweet.id, tweet.content, tweet.user.username])

# Creating a dataframe from the tweets list above
cbc_df = pd.DataFrame(cbc_list, columns=['Datetime', 'Tweet Id', 'Text', 'Username'])

#splitting date and time
cbc_df['Dates'] = pd.to_datetime(cbc_df['Datetime']).dt.date
cbc_df['Time'] = pd.to_datetime(cbc_df['Datetime']).dt.time

#removing useless tweets
cbc_df = cbc_df.drop(cbc_df[cbc_df['Text'].str.contains("DougHempstead")==True].index)
cbc_df = cbc_df.drop(cbc_df[cbc_df['Text'].str.contains("https://t.co/")==True].index)
cbc_df = cbc_df.drop(cbc_df[cbc_df['Text'].str.contains("tonight")==True].index)

# adding tags
cbc_df.loc[cbc_df['Text'].str.contains(r"collision|Collision|COLLISION|crash|CRASH|Crash|fender|Fender")==True,"Type"]="Collision"
cbc_df.loc[cbc_df['Text'].str.contains("slow|SLOW|Slow|backed up|backup|Backup|backing up|stop &amp; go|stop and go|CRAWLING|crawling|Congestion|congestion|CONGESTION|delay")==True,"Slow"]="Slow"
cbc_df.loc[cbc_df['Text'].str.contains("ditch|Ditch|DITCH|SPIN|spin|Spin|upside-down|roll-over|ROLL|Upside-down|Broke|broke|BLOW OUT|flat tire|stalled vehicule|fire|disabled vehicule|medical emergency")==True,"Accident"]="Accident"
cbc_df.loc[cbc_df['Text'].str.contains("Clos|clos|CLOS|blocked")==True,"Closure"]="Closure"
cbc_df.loc[cbc_df['Text'].str.contains(r"REDUC|Reduc|reduc|to 1|to 2|to 3|to one|to two|to three|LANE REDXN|Lane close|lane close")==True,"Lane Reduction"]="Lane Reduction"
cbc_df.loc[cbc_df['Text'].str.contains(r"RAMP|Ramp|ramp")==True,"Ramp"]="Ramp"  

#export to csv to check
cbc_df.to_csv (r'C:\Users\Emily\Documents\Homework\IRM3007\cbcottraffic.csv', index = False, header = True)

print('done cbcotttraffic', i)

#----------------


#Ottawa_Traffic tweet list
ottawa_list = []

# Using TwitterSearchScraper to scrape data and append tweets to list created above
i = 0
for i,tweet in enumerate(sntwitter.TwitterSearchScraper('from:Ottawa_Traffic since:2020-01-01 until:2022-01-01').get_items()):
    if i>12000:
        break
    ottawa_list.append([tweet.date, tweet.id, tweet.content, tweet.user.username])


# Creating a dataframe from the tweets list above
ottawa_df = pd.DataFrame(ottawa_list, columns=['Datetime', 'Tweet Id', 'Text', 'Username'])

#splitting date and time
ottawa_df['Dates'] = pd.to_datetime(ottawa_df['Datetime']).dt.date
ottawa_df['Time'] = pd.to_datetime(ottawa_df['Datetime']).dt.time


#removing useless tweets
ottawa_df = ottawa_df.drop(ottawa_df[ottawa_df['Text'].str.contains("Incident cleared")==True].index)
cbc_df = cbc_df.drop(cbc_df[cbc_df['Text'].str.contains("https://t.co/")==True].index)
ottawa_df = ottawa_df.drop(ottawa_df[ottawa_df['Text'].str.contains("tonight")==True].index)

# adding tags
ottawa_df.loc[ottawa_df['Text'].str.contains(r"collision|Collision|COLLISION|crash|CRASH|Crash|fender|Fender")==True,"Type"]="Collision"
ottawa_df.loc[ottawa_df['Text'].str.contains("slow|SLOW|Slow|backed up|backup|Backup|backing up|stop &amp; go|stop and go|CRAWLING|crawling|Congestion|congestion|CONGESTION|delay")==True,"Slow"]="Slow"
ottawa_df.loc[ottawa_df['Text'].str.contains("ditch|Ditch|DITCH|SPIN|spin|Spin|upside-down|roll-over|ROLL|Upside-down|Broke|broke|BLOW OUT|flat tire|stalled vehicule|fire|disabled vehicule|medical emergency")==True,"Accident"]="Accident"
ottawa_df.loc[ottawa_df['Text'].str.contains("Clos|clos|CLOS|blocked")==True,"Closure"]="Closure"
ottawa_df.loc[ottawa_df['Text'].str.contains(r"REDUC|Reduc|reduc|to 1|to 2|to 3|to one|to two|to three|LANE REDXN|Lane close|lane close")==True,"Lane Reduction"]="Lane Reduction"
ottawa_df.loc[ottawa_df['Text'].str.contains(r"RAMP|Ramp|ramp")==True,"Ramp"]="Ramp"          


#export to csv to check
ottawa_df.to_csv (r'C:\Users\Emily\Documents\Homework\IRM3007\Ottawa_Traffic.csv', index = False, header = True)

print('done Ottawa_Traffic', i)

#----------------


#CNOttawaTraffic tweet list
cn_list = []

# Using TwitterSearchScraper to scrape data and append tweets to list created above
i = 0
for i,tweet in enumerate(sntwitter.TwitterSearchScraper('from:CNOttawaTraffic since:2020-01-01 until:2022-01-01').get_items()):
    if i>20000:
        break
    cn_list.append([tweet.date, tweet.id, tweet.content, tweet.user.username])

# Creating a dataframe from the tweets list above
cn_df = pd.DataFrame(cn_list, columns=['Datetime', 'Tweet Id', 'Text', 'Username'])

#splitting date and time
cn_df['Dates'] = pd.to_datetime(cn_df['Datetime']).dt.date
cn_df['Time'] = pd.to_datetime(cn_df['Datetime']).dt.time

#removing useless tweets
cn_df = cn_df.drop(cn_df[cn_df['Text'].str.contains("CLEAR")==True].index)
cn_df = cn_df.drop(cn_df[cn_df['Text'].str.contains("https://t.co/")==True].index)
cn_df = cn_df.drop(cn_df[cn_df['Text'].str.contains("tonight")==True].index)

# adding tags
cn_df.loc[cn_df['Text'].str.contains(r"collision|Collision|COLLISION|crash|CRASH|Crash|fender|Fender")==True,"Type"]="Collision"
cn_df.loc[cn_df['Text'].str.contains("slow|SLOW|Slow|backed up|backup|Backup|backing up|stop &amp; go|stop and go|CRAWLING|crawling|Congestion|congestion|CONGESTION|delay")==True,"Slow"]="Slow"
cn_df.loc[cn_df['Text'].str.contains("ditch|Ditch|DITCH|SPIN|spin|Spin|upside-down|roll-over|ROLL|Upside-down|Broke|broke|BLOW OUT|flat tire|stalled vehicule|fire|disabled vehicule|medical emergency")==True,"Accident"]="Accident"
cn_df.loc[cn_df['Text'].str.contains("Clos|clos|CLOS|blocked")==True,"Closure"]="Closure"
cn_df.loc[cn_df['Text'].str.contains(r"REDUC|Reduc|reduc|to 1|to 2|to 3|to one|to two|to three|LANE REDXN|Lane close|lane close")==True,"Lane Reduction"]="Lane Reduction"
cn_df.loc[cn_df['Text'].str.contains(r"RAMP|Ramp|ramp")==True,"Ramp"]="Ramp"          

#export to csv to check
cn_df.to_csv (r'C:\Users\Emily\Documents\Homework\IRM3007\CNOttawaTraffic.csv', index = False, header = True)

print('done CNOttawaTraffic', i)


#----------------


#511ONEastern tweet list
on511_list = []

# Using TwitterSearchScraper to scrape data and append tweets to list created above
i = 0
for i,tweet in enumerate(sntwitter.TwitterSearchScraper('HWY417 from:511ONEastern since:2020-01-01 until:2022-01-01').get_items()):
    if i>6000:
        break
    on511_list.append([tweet.date, tweet.id, tweet.content, tweet.user.username])

for i,tweet in enumerate(sntwitter.TwitterSearchScraper('HWY416 from:511ONEastern since:2020-01-01 until:2022-01-01').get_items()):
    if i>6000:
        break
    on511_list.append([tweet.date, tweet.id, tweet.content, tweet.user.username])

# Creating a dataframe from the tweets list above
on511_df = pd.DataFrame(on511_list, columns=['Datetime', 'Tweet Id', 'Text', 'Username'])

#splitting date and time
on511_df['Dates'] = pd.to_datetime(on511_df['Datetime']).dt.date
on511_df['Time'] = pd.to_datetime(on511_df['Datetime']).dt.time

#removing useless tweets
on511_df = on511_df.drop(on511_df[on511_df['Text'].str.contains("Cleared")==True].index)
on511_df = on511_df.drop(on511_df[on511_df['Text'].str.contains("https://t.co/")==True].index)
on511_df = on511_df.drop(on511_df[on511_df['Text'].str.contains("tonight")==True].index)

# adding tags
on511_df.loc[on511_df['Text'].str.contains(r"collision|Collision|COLLISION|crash|CRASH|Crash|fender|Fender")==True,"Type"]="Collision"
on511_df.loc[on511_df['Text'].str.contains("slow|SLOW|Slow|backed up|backup|Backup|backing up|stop &amp; go|stop and go|CRAWLING|crawling|Congestion|congestion|CONGESTION|delay")==True,"Slow"]="Slow"
on511_df.loc[on511_df['Text'].str.contains("ditch|Ditch|DITCH|SPIN|spin|Spin|upside-down|roll-over|ROLL|Upside-down|Broke|broke|BLOW OUT|flat tire|stalled vehicule|fire|disabled vehicule|medical emergency")==True,"Accident"]="Accident"
on511_df.loc[on511_df['Text'].str.contains("Clos|clos|CLOS|blocked")==True,"Closure"]="Closure"
on511_df.loc[on511_df['Text'].str.contains(r"REDUC|Reduc|reduc|to 1|to 2|to 3|to one|to two|to three|LANE REDXN|Lane close|lane close")==True,"Lane Reduction"]="Lane Reduction"
on511_df.loc[on511_df['Text'].str.contains(r"RAMP|Ramp|ramp")==True,"Ramp"]="Ramp"                         

#export to csv to check
on511_df.to_csv (r'C:\Users\Emily\Documents\Homework\IRM3007\511ONEastern.csv', index = False, header = True)

print('done 511ONEastern', i)

#----------------

#OPP_ER tweet list
opp_list = []

# Using TwitterSearchScraper to scrape data and append tweets to list created above
i = 0
for i,tweet in enumerate(sntwitter.TwitterSearchScraper('417 from:OPP_ER since:2020-01-01 until:2022-01-01').get_items()):
    if i>12000:
        break
    opp_list.append([tweet.date, tweet.id, tweet.content, tweet.user.username])

for i,tweet in enumerate(sntwitter.TwitterSearchScraper('416 from:OPP_ER since:2020-01-01 until:2022-01-01').get_items()):
    if i>12000:
        break
    opp_list.append([tweet.date, tweet.id, tweet.content, tweet.user.username])

for i,tweet in enumerate(sntwitter.TwitterSearchScraper('ottawa from:OPP_ER since:2020-01-01 until:2022-01-01').get_items()):
    if i>12000:
        break
    opp_list.append([tweet.date, tweet.id, tweet.content, tweet.user.username])

# Creating a dataframe from the tweets list above
opp_df = pd.DataFrame(opp_list, columns=['Datetime', 'Tweet Id', 'Text', 'Username'])

#removing useless tweets
opp_df = opp_df.drop(opp_df[opp_df['Text'].str.contains("Cleared")==True].index)
#opp_df = opp_df.drop(opp_df[opp_df['Text'].str.contains("https://t.co/")==True].index)
opp_df = opp_df.drop(opp_df[opp_df['Text'].str.contains("tonight")==True].index)
opp_df = opp_df.drop(opp_df[opp_df['Text'].str.contains("Reopened|reopened|re-opened|RE-OPENED")==True].index)

# adding tags
opp_df.loc[opp_df['Text'].str.contains(r"collision|Collision|COLLISION|crash|CRASH|Crash|fender|Fender")==True,"Type"]="Collision"
opp_df.loc[opp_df['Text'].str.contains("slow|SLOW|Slow|backed up|backup|Backup|backing up|stop &amp; go|stop and go|CRAWLING|crawling|Congestion|congestion|CONGESTION|delay")==True,"Slow"]="Slow"
opp_df.loc[opp_df['Text'].str.contains("ditch|Ditch|DITCH|SPIN|spin|Spin|upside-down|roll-over|ROLL|Upside-down|Broke|broke|BLOW OUT|flat tire|stalled vehicule|fire|disabled vehicule|medical emergency")==True,"Accident"]="Accident"
opp_df.loc[opp_df['Text'].str.contains("Clos|clos|CLOS|blocked")==True,"Closure"]="Closure"
opp_df.loc[opp_df['Text'].str.contains(r"REDUC|Reduc|reduc|to 1|to 2|to 3|to one|to two|to three|LANE REDXN|Lane close|lane close")==True,"Lane Reduction"]="Lane Reduction"
opp_df.loc[opp_df['Text'].str.contains(r"RAMP|Ramp|ramp")==True,"Ramp"]="Ramp"  
opp_df.loc[opp_df['Text'].str.contains(r"StuntDriving")==True,"Stunt Driving"]="Stunt Driving"  

#export to csv to check
opp_df.to_csv (r'C:\Users\Emily\Documents\Homework\IRM3007\OPP_ER.csv', index = False, header = True)

print('done OPP_ER', i)

#----------------


#OPSTrafficCM tweet list
ops_list = []

# Using TwitterSearchScraper to scrape data and append tweets to list created above
i = 0
for i,tweet in enumerate(sntwitter.TwitterSearchScraper('from:OPSTrafficCM since:2020-01-01 until:2022-01-01').get_items()):
    if i>12000:
        break
    ops_list.append([tweet.date, tweet.id, tweet.content, tweet.user.username])

# Creating a dataframe from the tweets list above
ops_df = pd.DataFrame(ops_list, columns=['Datetime', 'Tweet Id', 'Text', 'Username'])

#removing useless tweets
ops_df = ops_df.drop(ops_df[ops_df['Text'].str.contains("Cleared")==True].index)
#ops_df = ops_df.drop(ops_df[ops_df['Text'].str.contains("https://t.co/")==True].index)
ops_df = ops_df.drop(ops_df[ops_df['Text'].str.contains("tonight")==True].index)
ops_df = ops_df.drop(ops_df[ops_df['Text'].str.contains("Reopened|reopened|re-opened|RE-OPENED")==True].index)

# adding tags
ops_df.loc[ops_df['Text'].str.contains(r"collision|Collision|COLLISION|crash|CRASH|Crash|fender|Fender")==True,"Type"]="Collision"
ops_df.loc[ops_df['Text'].str.contains("slow|SLOW|Slow|backed up|backup|Backup|backing up|stop &amp; go|stop and go|CRAWLING|crawling|Congestion|congestion|CONGESTION|delay")==True,"Slow"]="Slow"
ops_df.loc[ops_df['Text'].str.contains("ditch|Ditch|DITCH|SPIN|spin|Spin|upside-down|roll-over|ROLL|Upside-down|Broke|broke|BLOW OUT|flat tire|stalled vehicule|fire|disabled vehicule|medical emergency")==True,"Accident"]="Accident"
ops_df.loc[ops_df['Text'].str.contains("Clos|clos|CLOS|blocked")==True,"Closure"]="Closure"
ops_df.loc[ops_df['Text'].str.contains("REDUC|Reduc|reduc|to 1|to 2|to 3|to one|to two|to three|LANE REDXN|Lane close|lane close")==True,"Lane Reduction"]="Lane Reduction"
ops_df.loc[ops_df['Text'].str.contains("RAMP|Ramp|ramp")==True,"Ramp"]="Ramp"  
ops_df.loc[ops_df['Text'].str.contains("StuntDriving")==True,"Stunt Driving"]="Stunt Driving"  

#export to csv to check
ops_df.to_csv (r'C:\Users\Emily\Documents\Homework\IRM3007\OPSTrafficCM.csv', index = False, header = True)

print('done OPSTrafficCM', i)
