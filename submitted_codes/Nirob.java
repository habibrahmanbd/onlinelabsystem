/*
 	NIROB_APP is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    NIROB_APP is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with NIROB_APP.  If not, see <http://www.gnu.org/licenses/>.
 */
/***************************
 * Author @ Habibur Rahman
 * Student ID @ 123044
 * Dept. @ CSE
 * Institution @ RUET
 * Cell @ +8801739834866
 ****************************/
package appLounch;

import java.awt.Color;
import java.awt.Dimension;
import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Vector;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.JTextField;

public class Nirob extends JFrame implements ActionListener {

	private static int height;
	private static int width;
	
	//Main Window.....

	JFrame mainframe = new JFrame("NIROB Online Database");
	JPanel mainpanel = new JPanel();
	JButton insertbtn = new JButton("Insert");
	JButton viewbtn = new JButton("View");
	JButton modifybtn = new JButton("Modify");
	JButton deletebtn = new JButton("Delete");
	JButton searchbtn = new JButton("Search Blood");

	/* Variables For Insert Window */
	JFrame insertframe = new JFrame("Insert into Database");
	JPanel insertpanel = new JPanel();
	JLabel studentidlabel = new JLabel("Student Id:");
	JTextField studentidtext = new JTextField(20);
	JLabel studentnamelabel = new JLabel("Student Name:");
	JTextField studentnametext = new JTextField(20);
	JLabel departmentlabel = new JLabel("Department:");
	JTextField departmenttext = new JTextField(20);
	JLabel bloodgrouplabel = new JLabel("Blood Group:");
	JTextField bloodgrouptext = new JTextField(20);
	JLabel willlabel = new JLabel("Wiling Of Donation:");
	JTextField willtext = new JTextField(20);
	JLabel lastdonatelabel = new JLabel("Last Donate date:");
	JTextField lastdonatetext = new JTextField("YYYY-MM-DD");
	JLabel cellnolabel = new JLabel("Cell No.:");
	JTextField cellnotext = new JTextField(13);
	JButton insertsubmit = new JButton("Submit");
	

	// search before frame
	JFrame sbframe = new JFrame("Search into Database");
	JPanel sbpanel = new JPanel();
	JLabel sbbloodgrouplabel = new JLabel("Desired Blood:");
	JTextField sbbloodgrouptext = new JTextField(20);
	JButton searchsubmit = new JButton("Submit");

	// Variables for View Window
	JFrame viewframe = new JFrame("Database Data");
	JPanel viewpanel = new JPanel();

	// Variables for Modify Window
	JFrame modifyframe = new JFrame("Modify the Data");
	JPanel modifypanel = new JPanel();
	JLabel mstudentidlabel = new JLabel("Student Id:");
	JTextField mstudentidtext = new JTextField(20);
	JLabel mstudentnamelabel = new JLabel("Student Name:");
	JTextField mstudentnametext = new JTextField(20);
	JLabel mdepartmentlabel = new JLabel("Department:");
	JTextField mdepartmenttext = new JTextField(20);
	JLabel mbloodgrouplabel = new JLabel("Blood Group:");
	JTextField mbloodgrouptext = new JTextField(20);
	JLabel mwilllabel = new JLabel("Wiling Of Donation:");
	JTextField mwilltext = new JTextField(20);
	JLabel mlastdonatelabel = new JLabel("Last Donate date:");
	JTextField mlastdonatetext = new JTextField("YYYY-MM-DD");
	JLabel mcellnolabel = new JLabel("Cell No.:");
	JTextField mcellnotext = new JTextField(13);
	JButton modifysubmit = new JButton("Submit");

	// Variable for Delete Window
	JFrame deleteframe = new JFrame("Delete From the Database");
	JPanel deletepanel = new JPanel();
	JLabel dstudentidlabel = new JLabel("Student Id:");
	JTextField dstudentidtext = new JTextField(20);
	JLabel dstudentnamelabel = new JLabel("Student Name:");
	JTextField dstudentnametext = new JTextField(20);
	JLabel ddepartmentlabel = new JLabel("Department:");
	JTextField ddepartmenttext = new JTextField(20);
	JLabel dbloodgrouplabel = new JLabel("Blood Group:");
	JTextField dbloodgrouptext = new JTextField(20);
	JLabel dwilllabel = new JLabel("Wiling Of Donation:");
	JTextField dwilltext = new JTextField(20);
	JLabel dlastdonatelabel = new JLabel("Last Donate date:");
	JTextField dlastdonatetext = new JTextField("YYYY-MM-DD");
	JLabel dcellnolabel = new JLabel("Cell No.:");
	JTextField dcellnotext = new JTextField(13);

	JButton deletesubmit = new JButton("Submit");
	Connection con = null;
	Vector datacol = new Vector();
	Vector datarow = new Vector();
	JTable datatable;
	JScrollPane viewdata;

	public void init() {
		mainwindow();

	}

	public void mainwindow() {
		mainpanel.setBackground(Color.GRAY);
		mainpanel.setLayout(null);
		insertbtn.setBounds(300, 300, 100, 30);
		modifybtn.setBounds(450, 300, 100, 30);
		deletebtn.setBounds(600, 300, 100, 30);
		viewbtn.setBounds(750, 300, 100, 30);
		searchbtn.setBounds(900, 300, 150, 30);
		
		
		
		mainpanel.add(insertbtn);
		mainpanel.add(deletebtn);
		mainpanel.add(modifybtn);
		mainpanel.add(viewbtn);
		mainpanel.add(searchbtn);
		
		//Design Add...
		
		
		
		mainframe.add(mainpanel);
		mainframe.setSize(width, height);
		mainframe.setVisible(true);
		insertbtn.addActionListener(this);
		deletebtn.addActionListener(this);
		modifybtn.addActionListener(this);
		viewbtn.addActionListener(this);
		searchbtn.addActionListener(this);

	}

	public void insertwindow() {
		insertpanel.setBackground(Color.GRAY);
		studentidlabel.setForeground(Color.WHITE);
		studentnamelabel.setForeground(Color.WHITE);
		departmentlabel.setForeground(Color.WHITE);
		bloodgrouplabel.setForeground(Color.WHITE);
		willlabel.setForeground(Color.WHITE);
		lastdonatelabel.setForeground(Color.WHITE);
		cellnolabel.setForeground(Color.WHITE);

		insertpanel.setLayout(null);
		studentidlabel.setBounds(400, 150, 100, 20);
		studentidtext.setBounds(550, 150, 150, 30);
		studentnamelabel.setBounds(400, 200, 100, 20);
		studentnametext.setBounds(550, 200, 150, 30);
		departmentlabel.setBounds(400, 250, 100, 20);
		departmenttext.setBounds(550, 250, 150, 30);
		bloodgrouplabel.setBounds(400, 300, 100, 20);
		bloodgrouptext.setBounds(550, 300, 150, 30);
		willlabel.setBounds(400, 350, 100, 20);
		willtext.setBounds(550, 350, 150, 30);
		lastdonatelabel.setBounds(400, 400, 100, 20);
		lastdonatetext.setBounds(550, 400, 150, 30);
		cellnolabel.setBounds(400, 450, 100, 20);
		cellnotext.setBounds(550, 450, 150, 30);
		insertsubmit.setBounds(490, 500, 100, 30);

		insertpanel.add(studentidlabel);

		insertpanel.add(studentidtext);
		insertpanel.add(studentnamelabel);
		insertpanel.add(studentnametext);
		insertpanel.add(departmentlabel);
		insertpanel.add(departmenttext);
		insertpanel.add(bloodgrouplabel);
		insertpanel.add(bloodgrouptext);
		insertpanel.add(willlabel);
		insertpanel.add(willtext);
		insertpanel.add(lastdonatelabel);
		insertpanel.add(lastdonatetext);
		insertpanel.add(cellnolabel);
		insertpanel.add(cellnotext);
		insertpanel.add(insertsubmit);
		insertframe.add(insertpanel);

		insertframe.setSize(width, height);
		insertframe.setVisible(true);
		insertsubmit.addActionListener(this);
		insertframe.addWindowListener(new WindowAdapter() {
			public void windowClosing(WindowEvent e) {
				mainframe.setVisible(true);
			}
		});
	}

	public void searchbeforewindow() {
		sbpanel.setBackground(Color.GRAY);
		sbbloodgrouplabel.setForeground(Color.WHITE);

		sbpanel.setLayout(null);
		sbbloodgrouplabel.setBounds(400, 150, 100, 20);
		sbbloodgrouptext.setBounds(550, 150, 150, 30);

		searchsubmit.setBounds(490, 200, 100, 30);

		sbpanel.add(sbbloodgrouplabel);

		sbpanel.add(sbbloodgrouptext);

		sbpanel.add(searchsubmit);
		sbframe.add(sbpanel);

		sbframe.setSize(width, height);
		sbframe.setVisible(true);
		searchsubmit.addActionListener(this);
		sbframe.addWindowListener(new WindowAdapter() {
			public void windowClosing(WindowEvent e) {
				mainframe.setVisible(true);
			}
		});
	}

	public void viewwindow() {

		datacol.removeAllElements();
		datarow.removeAllElements();
		OpenDatabase();
		try {
			Statement st = con.createStatement();
			ResultSet rs = st.executeQuery("select * from students");
			ResultSetMetaData rms = rs.getMetaData();
			int cols = rms.getColumnCount();
			for (int i = 1; i <= cols; i++) {
				datacol.addElement(rms.getColumnName(i));
			}
			while (rs.next()) {
				Vector row = new Vector(cols);
				for (int i = 1; i <= cols; i++) {
					row.addElement(rs.getObject(i));
				}
				datarow.addElement(row);
			}
			datatable = new JTable(datarow, datacol);
			viewdata = new JScrollPane(datatable);

		} catch (Exception e) {
			JOptionPane.showConfirmDialog(null,
					"Problem in Database connectivity or Data", "Result",
					JOptionPane.DEFAULT_OPTION, JOptionPane.WARNING_MESSAGE);

		}
		viewpanel.setBackground(Color.GRAY);
		viewpanel.setLayout(null);
		viewdata.setBounds(20, 50, 1250, 600);
		viewpanel.add(viewdata);
		viewframe.add(viewpanel);
		viewframe.setSize(width, height);
		viewframe.setVisible(true);
		viewframe.addWindowListener(new WindowAdapter() {
			public void windowClosing(WindowEvent e) {
				mainframe.setVisible(true);
			}
		});

	}

	public void searchwindow(String blood) {

		datacol.removeAllElements();
		datarow.removeAllElements();
		OpenDatabase();
		try {
			Statement st = con.createStatement();
			ResultSet rs = st
					.executeQuery("SELECT * FROM `students` WHERE `Blood Group` LIKE '"
							+ blood
							+ "' AND `Willing of Donation` LIKE 'YES' AND `Cell No.` IS NOT NULL");
			ResultSetMetaData rms = rs.getMetaData();
			int cols = rms.getColumnCount();
			for (int i = 1; i <= cols; i++) {
				datacol.addElement(rms.getColumnName(i));
			}
			while (rs.next()) {
				Vector row = new Vector(cols);
				for (int i = 1; i <= cols; i++) {
					row.addElement(rs.getObject(i));
				}
				datarow.addElement(row);
			}
			datatable = new JTable(datarow, datacol);
			viewdata = new JScrollPane(datatable);

		} catch (Exception e) {
			JOptionPane.showConfirmDialog(null,
					"Problem in Database connectivity or Data", "Result",
					JOptionPane.DEFAULT_OPTION, JOptionPane.WARNING_MESSAGE);

		}
		viewpanel.setBackground(Color.GRAY);
		viewpanel.setLayout(null);
		viewdata.setBounds(20, 50, 1250, 600);
		viewpanel.add(viewdata);
		viewframe.add(viewpanel);
		viewframe.setSize(width, height);
		viewframe.setVisible(true);
		viewframe.addWindowListener(new WindowAdapter() {
			public void windowClosing(WindowEvent e) {
				mainframe.setVisible(true);
			}
		});

	}

	public void modifywindow() {
		mstudentnametext.disable();
		mdepartmenttext.disable();
		mbloodgrouptext.disable();
		mwilltext.disable();
		mlastdonatetext.disable();
		mcellnotext.disable();
		mstudentidtext.setText("");
		mstudentnametext.setText("");
		mdepartmenttext.setText("");
		mbloodgrouptext.setText("");
		mwilltext.setText("");
		mlastdonatetext.setText("");
		mcellnotext.setText("");
		modifypanel.setBackground(Color.GRAY);
		mstudentidlabel.setForeground(Color.WHITE);
		mstudentnamelabel.setForeground(Color.WHITE);
		mdepartmentlabel.setForeground(Color.WHITE);
		mbloodgrouplabel.setForeground(Color.WHITE);
		mwilllabel.setForeground(Color.WHITE);
		mlastdonatelabel.setForeground(Color.WHITE);
		mcellnolabel.setForeground(Color.WHITE);
		modifypanel.setLayout(null);

		mstudentidlabel.setBounds(400, 150, 100, 20);
		mstudentidtext.setBounds(550, 150, 150, 30);
		mstudentnamelabel.setBounds(400, 200, 100, 20);
		mstudentnametext.setBounds(550, 200, 150, 30);
		mdepartmentlabel.setBounds(400, 250, 100, 20);
		mdepartmenttext.setBounds(550, 250, 150, 30);
		mbloodgrouplabel.setBounds(400, 300, 100, 20);
		mbloodgrouptext.setBounds(550, 300, 150, 30);
		mwilllabel.setBounds(400, 350, 100, 20);
		mwilltext.setBounds(550, 350, 150, 30);
		mlastdonatelabel.setBounds(400, 400, 100, 20);
		mlastdonatetext.setBounds(550, 400, 150, 30);
		mcellnolabel.setBounds(400, 450, 100, 20);
		mcellnotext.setBounds(550, 450, 150, 30);
		modifysubmit.setBounds(490, 500, 100, 30);

		modifypanel.add(mstudentidlabel);

		modifypanel.add(mstudentidtext);
		modifypanel.add(mstudentnamelabel);
		modifypanel.add(mstudentnametext);
		modifypanel.add(mdepartmentlabel);
		modifypanel.add(mdepartmenttext);
		modifypanel.add(mbloodgrouplabel);
		modifypanel.add(mbloodgrouptext);
		modifypanel.add(mwilllabel);
		modifypanel.add(mwilltext);
		modifypanel.add(mlastdonatelabel);
		modifypanel.add(mlastdonatetext);
		modifypanel.add(mcellnolabel);
		modifypanel.add(mcellnotext);
		modifypanel.add(modifysubmit);
		modifyframe.add(modifypanel);

		modifyframe.setSize(width, height);
		modifyframe.setVisible(true);
		modifysubmit.addActionListener(this);
		modifyframe.addWindowListener(new WindowAdapter() {
			public void windowClosing(WindowEvent e) {
				mainframe.setVisible(true);
			}
		});
		mstudentidtext.addActionListener(this);

	}

	public void deletewindow() {
		dstudentnametext.disable();
		ddepartmenttext.disable();
		dbloodgrouptext.disable();
		dwilltext.disable();
		dlastdonatetext.disable();
		dcellnotext.disable();

		dstudentidtext.setText("");
		dstudentnametext.setText("");
		ddepartmenttext.setText("");
		dbloodgrouptext.setText("");
		dwilltext.setText("");
		dlastdonatetext.setText("");
		dcellnotext.setText("");
		deletepanel.setBackground(Color.GRAY);
		dstudentidlabel.setForeground(Color.WHITE);
		dstudentnamelabel.setForeground(Color.WHITE);
		ddepartmentlabel.setForeground(Color.WHITE);
		dbloodgrouplabel.setForeground(Color.WHITE);
		dwilllabel.setForeground(Color.WHITE);
		dlastdonatelabel.setForeground(Color.WHITE);
		dcellnolabel.setForeground(Color.WHITE);
		deletepanel.setLayout(null);

		dstudentidlabel.setBounds(400, 150, 100, 20);
		dstudentidtext.setBounds(550, 150, 150, 30);
		dstudentnamelabel.setBounds(400, 200, 100, 20);
		dstudentnametext.setBounds(550, 200, 150, 30);
		ddepartmentlabel.setBounds(400, 250, 100, 20);
		ddepartmenttext.setBounds(550, 250, 150, 30);
		dbloodgrouplabel.setBounds(400, 300, 100, 20);
		dbloodgrouptext.setBounds(550, 300, 150, 30);
		dwilllabel.setBounds(400, 350, 100, 20);
		dwilltext.setBounds(550, 350, 150, 30);
		dlastdonatelabel.setBounds(400, 400, 100, 20);
		dlastdonatetext.setBounds(550, 400, 150, 30);
		dcellnolabel.setBounds(400, 450, 100, 20);
		dcellnotext.setBounds(550, 450, 150, 30);
		deletesubmit.setBounds(490, 500, 100, 30);

		deletepanel.add(dstudentidlabel);

		deletepanel.add(dstudentidtext);
		deletepanel.add(dstudentnamelabel);
		deletepanel.add(dstudentnametext);
		deletepanel.add(ddepartmentlabel);
		deletepanel.add(ddepartmenttext);
		deletepanel.add(dbloodgrouplabel);
		deletepanel.add(dbloodgrouptext);
		deletepanel.add(dwilllabel);
		deletepanel.add(dwilltext);
		deletepanel.add(dlastdonatelabel);
		deletepanel.add(dlastdonatetext);
		deletepanel.add(dcellnolabel);
		deletepanel.add(dcellnotext);
		deletepanel.add(deletesubmit);
		deleteframe.add(deletepanel);

		deleteframe.setSize(width, height);
		deleteframe.setVisible(true);
		deletesubmit.addActionListener(this);
		dstudentidtext.addActionListener(this);
		deleteframe.addWindowListener(new WindowAdapter() {
			public void windowClosing(WindowEvent e) {
				mainframe.setVisible(true);
			}
		});

	}

	public void insertdata(int sid, String sname, String dept, String blood,
			String will, String lastdate, String cell) {
		try {
			Statement st = con.createStatement();
			st.execute("INSERT INTO `nirob`.`students` (`Student ID`, `Name`, `Department`, `Blood Group`, `Willing of Donation`, `Last Donation Date`, `Cell No.`) VALUES ('"
					+ sid
					+ "', '"
					+ sname
					+ "', '"
					+ dept
					+ "', '"
					+ blood
					+ "', '" + will + "', '" + lastdate + "', '" + cell + "')");
			JOptionPane.showConfirmDialog(null, "Your Data Has been Inserted",
					"Result", JOptionPane.DEFAULT_OPTION,
					JOptionPane.PLAIN_MESSAGE);
		} catch (Exception e) {
			JOptionPane.showConfirmDialog(null,
					"Problem in Database connectivity or Data", "Result",
					JOptionPane.DEFAULT_OPTION, JOptionPane.WARNING_MESSAGE);
		}
	}

	public void deletedata(int sid) {
		try {
			Statement st = con.createStatement();
			st.executeUpdate("delete from `students` where `Student ID`=" + sid);
			JOptionPane.showConfirmDialog(null, "Your Data Has been Deleted",
					"Result", JOptionPane.DEFAULT_OPTION,
					JOptionPane.PLAIN_MESSAGE);
		} catch (Exception e) {
			JOptionPane.showConfirmDialog(null,
					"Problem in Database connectivity or Data", "Result",
					JOptionPane.DEFAULT_OPTION, JOptionPane.WARNING_MESSAGE);
		}
	}

	public void modifydata(int sid, String sname, String dept, String blood,
			String will, String lastdate, String cell) {
		try {
			Statement st = con.createStatement();
			st.executeUpdate("UPDATE `nirob`.`students` SET `Name` = '" + sname
					+ "', `Department` = '" + dept + "', `Blood Group` = '"
					+ blood + "', `Willing of Donation` = '" + will
					+ "', `Last Donation Date` = '" + lastdate
					+ "', `Cell No.` = '" + cell
					+ "' WHERE `students`.`Student ID` = " + sid);
			// st.executeUpdate("update students set Name='"+sname+"', Department='"+dept+"', Blood Group='"+blood+"', Willing Of Donatation='"+will+", Last Donation Date='"+lastdate+", Cell No.='"+cell+"' where Student ID="+sid);
			JOptionPane.showConfirmDialog(null, "Your Data Has been Modified",
					"Result", JOptionPane.DEFAULT_OPTION,
					JOptionPane.PLAIN_MESSAGE);
		} catch (Exception e) {
			JOptionPane.showConfirmDialog(null,
					"Problem in Database connectivity or Data", "Result",
					JOptionPane.DEFAULT_OPTION, JOptionPane.WARNING_MESSAGE);
		}
	}

	public void OpenDatabase() {

		try {
			Class.forName("com.mysql.jdbc.Driver");
			con = DriverManager.getConnection("jdbc:mysql://db4free.net:3306/nirob","list","12345678");

		} catch (Exception e) {
			System.out.println(e);
		}
	}

	public void CloseDatabase() {
		try {
			con.close();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}

	@Override
	public void actionPerformed(ActionEvent arg0) {
		// TODO Auto-generated method stub
		if (arg0.getSource() == insertbtn) {
			mainframe.setVisible(false);
			insertwindow();
		}
		if (arg0.getSource() == viewbtn) {
			mainframe.setVisible(false);
			viewwindow();
		}
		if (arg0.getSource() == searchbtn) {
			mainframe.setVisible(false);
			searchbeforewindow();
		}
		if (arg0.getSource() == modifybtn) {
			mainframe.setVisible(false);
			modifywindow();
		}
		if (arg0.getSource() == deletebtn) {
			mainframe.setVisible(false);
			deletewindow();
		}
		if (arg0.getSource() == insertsubmit) {
			int sid = Integer.parseInt(studentidtext.getText());
			String sname = studentnametext.getText();
			String dept = departmenttext.getText();
			String blood = bloodgrouptext.getText();
			String will = willtext.getText();
			String lastdate = lastdonatetext.getText();
			String cell = cellnotext.getText();

			try {
				OpenDatabase();
				insertdata(sid, sname, dept, blood, will, lastdate, cell);

				CloseDatabase();

			} catch (Exception e) {
				System.out.println(e);
			}
			studentidtext.setText("");
			studentnametext.setText("");
			departmenttext.setText("");
			bloodgrouptext.setText("");
			willtext.setText("");
			lastdonatetext.setText("");
			cellnotext.setText("");

		}
		if (arg0.getSource() == searchsubmit) {

			String blood = sbbloodgrouptext.getText();
			sbframe.setVisible(false);
			searchwindow(blood);
		}
		if (arg0.getSource() == modifysubmit) {
			int sid = Integer.parseInt(mstudentidtext.getText());
			String sname = mstudentnametext.getText();
			String dept = mdepartmenttext.getText();
			String blood = mbloodgrouptext.getText();
			String will = mwilltext.getText();
			String lastdate = mlastdonatetext.getText();
			String cell = mcellnotext.getText();
			OpenDatabase();
			modifydata(sid, sname, dept, blood, will, lastdate, cell);
			CloseDatabase();
			// setting null
			mstudentidtext.setText("");
			mstudentnametext.setText("");
			mdepartmenttext.setText("");
			mbloodgrouptext.setText("");
			mwilltext.setText("");
			mlastdonatetext.setText("");
			mcellnotext.setText("");
			// setting uneditable
			mstudentnametext.disable();
			mdepartmenttext.disable();
			mbloodgrouptext.disable();
			mwilltext.disable();
			mlastdonatetext.disable();
			mcellnotext.disable();
		}
		if (arg0.getSource() == deletesubmit) {
			int sid = Integer.parseInt(dstudentidtext.getText());
			OpenDatabase();
			deletedata(sid);
			CloseDatabase();
			sid = 0;
			dstudentidtext.setText("");
			dstudentnametext.setText("");
			ddepartmenttext.setText("");
			dbloodgrouptext.setText("");
			dwilltext.setText("");
			dlastdonatetext.setText("");
			dcellnotext.setText("");
			// setting uneditable
			dstudentnametext.disable();
			ddepartmenttext.disable();
			dbloodgrouptext.disable();
			dwilltext.disable();
			dlastdonatetext.disable();
			dcellnotext.disable();
		}
		if (arg0.getSource() == mstudentidtext) {
			int sid = Integer.parseInt(mstudentidtext.getText());
			try {
				OpenDatabase();
				Statement st = con.createStatement();
				ResultSet rs = st
						.executeQuery("SELECT * FROM `students` WHERE `Student ID`="
								+ sid);
				if (rs.next()) {
					mstudentnametext.setText(rs.getString("Name"));
					mdepartmenttext.setText(rs.getString("Department"));
					mbloodgrouptext.setText(rs.getString("Blood Group"));
					mwilltext.setText(rs.getString("Willing Of Donation"));
					mlastdonatetext.setText(rs.getString("Last Donation Date"));
					mcellnotext.setText(rs.getString("Cell No."));
				}
				CloseDatabase();
				mstudentnametext.enable();
				mdepartmenttext.enable();
				mbloodgrouptext.enable();
				mwilltext.enable();
				mlastdonatetext.enable();
				mcellnotext.enable();
			} catch (Exception e) {

				JOptionPane.showConfirmDialog(null,
						"Update!!!! Problem in Database connectivity or Data",
						"Result", JOptionPane.DEFAULT_OPTION,
						JOptionPane.WARNING_MESSAGE);
			}
		}
		if (arg0.getSource() == dstudentidtext) {
			int sid = Integer.parseInt(dstudentidtext.getText());
			try {
				OpenDatabase();
				Statement st = con.createStatement();
				ResultSet rs = st
						.executeQuery("Select * from `students` where `Student ID`="
								+ sid);
				if (rs.next()) {
					dstudentnametext.setText(rs.getString("Name"));
					ddepartmenttext.setText(rs.getString("Department"));
					dbloodgrouptext.setText(rs.getString("Blood Group"));
					dwilltext.setText(rs.getString("Willing of Donation"));
					dlastdonatetext.setText(rs.getString("Last Donation Date"));
					dcellnotext.setText(rs.getString("Cell No."));
				}
				CloseDatabase();
				dstudentnametext.enable();
				ddepartmenttext.enable();
				dbloodgrouptext.enable();
				dwilltext.enable();
				dlastdonatetext.enable();
				dcellnotext.enable();

			} catch (Exception e) {
				JOptionPane.showConfirmDialog(null,
						"Delete...Problem in Database connectivity or Data",
						"Result", JOptionPane.DEFAULT_OPTION,
						JOptionPane.WARNING_MESSAGE);
			}
		}

	}
	//paint.....
	

	public static void main(String args[]) {
		Dimension screenSize = Toolkit.getDefaultToolkit().getScreenSize();
		height = (int) screenSize.getHeight();
		width = (int) screenSize.getWidth();
		Nirob dm = new Nirob();
		dm.init();

	}

}
