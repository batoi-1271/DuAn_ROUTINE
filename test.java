private static final String  DATABASE_NAME =  "QLSinhVien.db";
    private static final String TABLE_NAME = "tb_sinhvien";
    private static final String ID = "masinhvien";
    private static final String NAME = "hoten";
    private static final int GIOITINH = 0;
    private static final String DIENTHOAI = "dienthoai";
    private static final String EMAIL = "email";
    private static int VERSION = 1;
    private Context context;

    public Database(Context context) {
        super(context, DATABASE_NAME, null, VERSION);
        this.context = context;
    }
    @Override
    public void onCreate(SQLiteDatabase sqLiteDatabase) {
        String sql = "create table "+TABLE_NAME+"("
                +ID+" integer primary key autoincrement,"
                +NAME+" Text,"
                +GIOITINH+" Integer,"
                +DIENTHOAI+" Text,"
                +EMAIL+" Text,"
        sqLiteDatabase.execSQL(sql);
    }

    @Override
    public void onUpgrade(SQLiteDatabase sqLiteDatabase, int i, int i1) {
        sqLiteDatabase.execSQL("drop table if exists "+DATABASE_NAME);
        onCreate(sqLiteDatabase);
    }
    public void insert(Student st){
        SQLiteDatabase sqLiteDatabase = this.getWritableDatabase();
        ContentValues values = new ContentValues();
        values.put(BKS, st.getBks());
        values.put(NAMECX, st.getTenchuxe());
        values.put(HANGXE, st.getHangxe());
        values.put(TRONGTAI, st.getTrongtai());
        values.put(HTKINHDOANH, st.getHtkinhdoanh());

        sqLiteDatabase.insert(TABLE_NAME,null,values);
        sqLiteDatabase.close();

    }
    public int update (Student st){
        SQLiteDatabase sqLiteDatabase = this.getWritableDatabase();
        ContentValues values = new ContentValues();
        values.put(BKS, st.getBks());
        values.put(NAMECX, st.getTenchuxe());
        values.put(HANGXE, st.getHangxe());
        values.put(TRONGTAI, st.getTrongtai());
        values.put(HTKINHDOANH, st.getHtkinhdoanh());

        int result = sqLiteDatabase.update(TABLE_NAME,values,ID +"=?",new String[]{String.valueOf(st.getId())});
        sqLiteDatabase.close();
        return result;
    }
    public int delete (int id){
        SQLiteDatabase sqLiteDatabase = this.getWritableDatabase();
        int result = sqLiteDatabase.delete(TABLE_NAME,ID+"=?",new String[]{String.valueOf(id)});
        sqLiteDatabase.close();
        return result;
    }
    public List<Student> getAll(){
        List<Student> vatTaiList = new ArrayList<>();
        SQLiteDatabase sqLiteDatabase = this.getReadableDatabase();

        String sql = "select * from "+TABLE_NAME;

        Cursor cursor = sqLiteDatabase.rawQuery(sql,null);

        if(cursor.moveToFirst()){
            do {
                Student vatTai = new Student();
                vatTai.setId(cursor.getInt(0));
                vatTai.setBks(cursor.getString(1));
                vatTai.setTenchuxe(cursor.getString(2));
                vatTai.setHangxe(cursor.getString(3));
                vatTai.setTrongtai(cursor.getString(4));
                vatTai.setHtkinhdoanh(cursor.getString(5));

                vatTaiList.add(vatTai);
            } while (cursor.moveToNext());
        }

        return vatTaiList;
    }
    public Student findById(int id){
        SQLiteDatabase sqLiteDatabase = this.getReadableDatabase();

        Cursor cursor = sqLiteDatabase.query(TABLE_NAME,new String[]{ID,BKS, NAMECX, HANGXE, TRONGTAI, HTKINHDOANH },
                ID+"=?",new String[]{
                        String.valueOf(id)
                },null,null,null,null);

        if(cursor!=null){
            try {
                cursor.moveToFirst();
                Student st = new Student();
                vatTai.setId(cursor.getInt(0));
                vatTai.setBks(cursor.getString(1));
                vatTai.setTenchuxe(cursor.getString(2));
                vatTai.setHangxe(cursor.getString(3));
                vatTai.setTrongtai(cursor.getString(4));
                vatTai.setHtkinhdoanh(cursor.getString(5));
                cursor.close();
                sqLiteDatabase.close();
                return vatTai;
            }
            catch (Exception e){
                return null;
            }
        }
        return null;
    }