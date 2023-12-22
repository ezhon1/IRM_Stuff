import os
import snscrape
import snscrape.modules.twitter as sntwitter
import pandas as pd

#list for all scraped tweets
tweet_list = []



# Using TwitterSearchScraper to scrape data and append tweets to list created above

#cbcottraffic tweets
for i,tweet in enumerate(sntwitter.TwitterSearchScraper('#otttraffic from:cbcotttraffic since:2020-01-01 until:2022-01-01').get_items()):
    if i>6000:
        break
    tweet_list.append([tweet.date, tweet.id, tweet.content, tweet.user.username])

print('done cbcotttraffic', i)

#Ottawa_Traffic tweets
for i,tweet in enumerate(sntwitter.TwitterSearchScraper('from:Ottawa_Traffic since:2020-01-01 until:2022-01-01').get_items()):
    if i>12000:
        break
    tweet_list.append([tweet.date, tweet.id, tweet.content, tweet.user.username])

print('done Ottawa_Traffic', i)

#CNOttawaTraffic tweets
for i,tweet in enumerate(sntwitter.TwitterSearchScraper('from:CNOttawaTraffic since:2020-01-01 until:2022-01-01').get_items()):
    if i>20000:
        break
    tweet_list.append([tweet.date, tweet.id, tweet.content, tweet.user.username])

print('done CNOttawaTraffic', i)

#511ONEastern tweets
for i,tweet in enumerate(sntwitter.TwitterSearchScraper('HWY417 from:511ONEastern since:2020-01-01 until:2022-01-01').get_items()):
    if i>6000:
        break
    tweet_list.append([tweet.date, tweet.id, tweet.content, tweet.user.username])

for i,tweet in enumerate(sntwitter.TwitterSearchScraper('HWY416 from:511ONEastern since:2020-01-01 until:2022-01-01').get_items()):
    if i>6000:
        break
    tweet_list.append([tweet.date, tweet.id, tweet.content, tweet.user.username])

print('done 511ONEastern', i)



# Creating a dataframe from the tweets list above
tweet_df = pd.DataFrame(tweet_list, columns=['Datetime', 'Tweet Id', 'Text', 'Username'])
print('dataframe created')

#splitting date and time
tweet_df['Dates'] = pd.to_datetime(tweet_df['Datetime']).dt.date
tweet_df['Time'] = pd.to_datetime(tweet_df['Datetime']).dt.time
print('dateTime split')

#removing unnecessary tweets
tweet_df = tweet_df.drop(tweet_df[tweet_df['Text'].str.contains("DougHempstead")==True].index)
tweet_df = tweet_df.drop(tweet_df[tweet_df['Text'].str.contains("Incident cleared")==True].index)
tweet_df = tweet_df.drop(tweet_df[tweet_df['Text'].str.contains("CLEAR")==True].index)
tweet_df = tweet_df.drop(tweet_df[tweet_df['Text'].str.contains("Cleared")==True].index)
tweet_df = tweet_df.drop(tweet_df[tweet_df['Text'].str.contains("https://t.co/")==True].index)
tweet_df = tweet_df.drop(tweet_df[tweet_df['Text'].str.contains("tonight")==True].index)
print('irrelevant tweets deleted')

# adding tags
tweet_df.loc[tweet_df['Text'].str.contains(r"collision|Collision|COLLISION|crash|CRASH|Crash|fender|Fender")==True,"Collision"]="yes"
tweet_df.loc[tweet_df['Text'].str.contains("slow|SLOW|Slow|backed up|backup|Backup|backing up|stop &amp; go|stop and go|CRAWLING|crawling|Congestion|congestion|CONGESTION|delay")==True,"Slow"]="yes"
tweet_df.loc[tweet_df['Text'].str.contains("ditch|Ditch|DITCH|SPIN|spin|Spin|upside-down|roll-over|ROLL|Upside-down|Broke|broke|BLOW OUT|flat tire|stalled vehicule|fire|disabled vehicule|medical emergency")==True,"Accident"]="yes"
tweet_df.loc[tweet_df['Text'].str.contains("Clos|clos|CLOS|blocked")==True,"Closure"]="yes"
tweet_df.loc[tweet_df['Text'].str.contains(r"REDUC|Reduc|reduc|to 1|to 2|to 3|to one|to two|to three|LANE REDXN|Lane close|lane close")==True,"Lane Reduction"]="yes"
tweet_df.loc[tweet_df['Text'].str.contains(r"RAMP|Ramp|ramp")==True,"Ramp"]="yes"  
print('tags added')

s#export to csv becuase it won't let me export excel for some reason
tweet_df.to_csv(r'C:\Users\Emily\Documents\Homework\IRM3007\thi.csv', index = False, header = True)


print('complete')
