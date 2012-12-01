using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Animation;
using System.Windows.Shapes;
using Microsoft.Phone.Controls;
using System.Xml.Linq;


namespace TrackMate
{
    public partial class MainPage : PhoneApplicationPage
    {
        // Constructor
        public MainPage()
        {
            String TaskID=String.Empty;
            String ToDo=String.Empty;
            InitializeComponent();
            XDocument FeedXML=XDocument.Load("feed.xml");
            var query=from task in FeedXML.Descendants("task")
                      select task;

            foreach (var item in query)
            {
                var query2 = from taskName in item.Descendants("toDo") select taskName;
                var query3 =from toDo in item.Descendants("taskID") select toDo;

                foreach (var item2 in query2)
                {
                    ToDo = item2.Value;
                }
                foreach (var item3 in query3)
                {
                    TaskID = item3.Value;
                }
                CheckBox checkBox = new CheckBox();
                checkBox.Name = TaskID;
                checkBox.Content = ToDo.ToString();
                
                checkBox.FontSize = 25;                
                FeedStackPanel.Children.Add(checkBox);

            }
        }
    }
}